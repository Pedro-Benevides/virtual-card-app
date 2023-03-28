<?php

namespace App\Http\Livewire;

use App\Models\PersonCard;
use App\Services\Contracts\PersonCardService;
use Livewire\Component;

class VirtualCard extends Component
{
    public PersonCard $card;

    public function mount(string $cardUuid)
    {
        /** @var PersonCardService */
        $service = app(PersonCardService::class);

        $personCard = $service->findOrError($cardUuid);

        $this->card = $personCard;
    }

    public function render()
    {
        return view('livewire.virtual-card')
            ->layout('layouts.app');
    }
}
