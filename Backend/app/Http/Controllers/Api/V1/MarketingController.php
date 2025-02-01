<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Marketing\MarketingCollection;
use App\Services\MarketingService;

class MarketingController extends Controller
{
    public function __construct(protected MarketingService $marketingService)
    {
        //
    }

    public function index(): MarketingCollection
    {
        return $this->marketingService->all();
    }
}
