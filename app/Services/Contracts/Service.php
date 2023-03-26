<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Service
{
    public function findOrError(string $uuid): Model;
}
