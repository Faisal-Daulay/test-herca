<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Resources\Api\V1\Marketing\MarketingCollection;
use App\Models\Marketing;

class MarketingService
{
    public function all(): MarketingCollection
    {
        return MarketingCollection::make(Marketing::all());
    }
}
