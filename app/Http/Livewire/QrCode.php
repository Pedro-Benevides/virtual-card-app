<?php

namespace App\Http\Livewire;

use App\Models\PersonCard;
use App\Services\Contracts\PersonCardService;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class QrCode extends Component
{
    use WithFileUploads;

    public PersonCard $card;
    public string $qrCodePath;

    public function render()
    {
        return view('livewire.qr-code')
            ->layout('layouts.app');
    }

    public function mount(string $cardUuid)
    {
        /** @var PersonCardService */
        $service = app(PersonCardService::class);

        $personCard = $service->findOrError($cardUuid);

        $this->card = $personCard;
        $this->qrCodePath = $this->saveCode($cardUuid);
    }

    private function saveCode(string $cardUuid)
    {
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        $data = $writer->writeString(url("/person-cards/{$cardUuid}"));

        $filename = md5($cardUuid) . '_qrcode.svg';
        $path = storage_path('app/public/' . $filename);
        file_put_contents($path, $data);

        return $path;
    }

    public function exports()
    {
        return response()->download($this->qrCodePath, md5($this->card->uuid) . '_qrcode.svg', [
            'Content-Type' => 'image/svg+xml',
        ]);
    }
}
