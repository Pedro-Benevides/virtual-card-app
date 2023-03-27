<?php

namespace App\Http\Livewire;

use App\DTO\CreatePersonCard;
use App\Services\Contracts\PersonCardService;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

use Livewire\Component;

class QrCodeGenerate extends Component
{
    public string $name;
    public string $linkedin_url;
    public string $github_url;

    protected $rules = [
        'name' => 'required|string|max:255',
        'linkedin_url' => 'nullable|string|max:255',
        'github_url' => 'nullable|string|max:255',
    ];

    public function render()
    {
        return view('livewire.qr-code-generate');
    }

    public function submit()
    {
        $data = $this->getData($this->validate());

        /** @var PersonCardService */
        $service = app(PersonCardService::class);

        $personCard = $service->create($data);

        list($qrcodePath, $filename) = $this->genCode($personCard->uuid);

        return response()->download($qrcodePath, $filename, [
            'Content-Type' => 'image/svg+xml',
        ]);
    }

    private function getData(array $attributes): CreatePersonCard
    {
        $data = new CreatePersonCard();

        $data->personName = $attributes['name'];
        $data->linkedinUrl = $attributes['linkedin_url'];
        $data->githubUrl = $attributes['github_url'];

        return $data;
    }

    private function genCode(string $cardUuid)
    {
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        $data = $writer->writeString(url("/person-cards/{$cardUuid}"));

        $filename = 'qr-code.svg';
        $path = storage_path('app/public/' . $filename);
        file_put_contents($path, $data);

        return [$path, $filename];
    }
}
