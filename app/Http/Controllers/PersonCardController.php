<?php

namespace App\Http\Controllers;

use App\DTO\CreatePersonCard;
use App\Http\Requests\CreatePersonCardRequest;
use App\Services\Contracts\PersonCardService;
use Illuminate\Http\Request;

class PersonCardController extends Controller
{
    public function __construct(private PersonCardService $cardService)
    {
        //
    }

    public function create(CreatePersonCardRequest $request)
    {
        $data = $request->getData();

        $personCard = $this->cardService->create($data);

        return response()->json($personCard);
    }

    public function getByUuid(string $cardUuid)
    {
        $personCard = $this->cardService->findOrError($cardUuid);

        return response()->json($personCard);
    }
}
