<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Resources\Api\V1\Transaction\TransactionCollection;
use App\Models\Transactions;

class TransactionService
{
    public function all(): TransactionCollection
    {
        return new TransactionCollection(Transactions::with(['payment'])->get());
    }
}
