<?php

namespace App\Http\Livewire;

use App\DTO\CreatePersonCard;
use App\Services\Contracts\PersonCardService;
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
        return view('livewire.qr-code-generate')
            ->layout('layouts.app');
    }

    public function submit()
    {
        $data = $this->getData($this->validate());

        /** @var PersonCardService */
        $service = app(PersonCardService::class);

        $personCard = $service->create($data);

        return redirect()->to("/person-cards/{$personCard->uuid}/qr-code");
    }

    private function getData(array $attributes): CreatePersonCard
    {
        $data = new CreatePersonCard();

        $data->personName = $attributes['name'];
        $data->linkedinUrl = $attributes['linkedin_url'];
        $data->githubUrl = $attributes['github_url'];

        return $data;
    }
}
