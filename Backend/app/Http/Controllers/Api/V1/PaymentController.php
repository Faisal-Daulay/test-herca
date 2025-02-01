<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\PaymentRequest;
use App\Http\Resources\Api\V1\Payment\PaymentResource;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    public function __construct(protected PaymentService $paymentService)
    {
        //
    }

    public function index(): JsonResponse
    {
        return $this->paymentService->all();
    }

    public function store(PaymentRequest $request): PaymentResource
    {
        return $this->paymentService->store($request->validated());
    }
}
