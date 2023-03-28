<?php

namespace App\Http\Controllers;

use LaravelQRCode\Facades\QRCode;

class PersonCardController extends Controller
{

    public function genCode(string $cardUuid)
    {
        return QRCode::url(url("/person-cards/{$cardUuid}"))
            ->setSize(8)
            ->setMargin(2)
            ->png();
    }
}
