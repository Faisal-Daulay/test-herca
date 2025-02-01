<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Resources\Api\V1\Cargo\CargoCollection;
use App\Models\Cargo;

class CargoService
{
    public function all(): CargoCollection
    {
        return new CargoCollection(Cargo::all());
    }
}
