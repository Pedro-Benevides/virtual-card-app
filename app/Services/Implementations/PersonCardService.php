<?php

namespace App\Services\Implementations;

use App\DTO\CreatePersonCard;
use App\Models\PersonCard;
use App\Repositories\PersonCardRepository;
use App\Services\Contracts\PersonCardService as Contract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class PersonCardService implements Contract
{
    public function __construct(
        private PersonCardRepository $cards
    ) {
        //
    }

    public function create(CreatePersonCard $data): PersonCard
    {
        try {
            DB::beginTransaction();

            $personCard = $this->cards->create([
                PersonCard::PERSON_NAME => $data->personName,
                PersonCard::LINKEDIN_URL => $data->linkedinUrl,
                PersonCard::GITHUB_URL => $data->githubUrl,
                PersonCard::UUID => Str::uuid()->toString()
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return $personCard;
    }

    public function findOrError(string $personCardUuid): PersonCard
    {
        $personCard = $this->cards->findUuid($personCardUuid);

        throw_unless(
            $personCard,
            ResourceNotFoundException::class
        );

        return $personCard;
    }
}
