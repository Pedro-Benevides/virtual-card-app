<?php

namespace App\Services\Contracts;

use App\DTO\CreatePersonCard;
use App\Models\PersonCard;

interface PersonCardService extends Service
{
    public function create(CreatePersonCard $data): PersonCard;
}
