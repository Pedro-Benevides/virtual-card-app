<?php

namespace App\Repositories;

use App\Models\PersonCard;
use Illuminate\Database\Eloquent\Model;

class PersonCardRepository extends Repository
{
    protected $model = PersonCard::class;

    public function byPersonNameLike(string $personName)
    {
        return $this->ilike(PersonCard::PERSON_NAME, $personName);
    }
}
