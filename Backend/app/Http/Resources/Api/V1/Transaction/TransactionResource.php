<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1\Transaction;

use App\Http\Resources\Api\V1\Payment\PaymentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'payment' => PaymentResource::make($this->whenLoaded('payment')),
            'transaction_number' => $this->whenHas('transaction_number'),
            'date' => $this->whenHas('date'),
        ];
    }
}
