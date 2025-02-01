<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Transaction\TransactionCollection;
use App\Services\TransactionService;

class TransactionController extends Controller
{
    public function __construct(protected TransactionService $transactionService)
    {
        //
    }

    public function index(): TransactionCollection
    {
        return new TransactionCollection($this->transactionService->all());
    }
}
