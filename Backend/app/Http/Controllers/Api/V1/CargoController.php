<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Cargo\CargoCollection;
use App\Services\CargoService;

class CargoController extends Controller
{
    public function __construct(protected CargoService $cargoService)
    {
        //
    }

    public function index(): CargoCollection
    {
        return new CargoCollection($this->cargoService->all());
    }
}
