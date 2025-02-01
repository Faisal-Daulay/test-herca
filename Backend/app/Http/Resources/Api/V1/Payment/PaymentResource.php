<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1\Payment;

use App\Http\Resources\Api\V1\Cargo\CargoResource;
use App\Http\Resources\Api\V1\Marketing\MarketingResource;
use App\Http\Resources\Api\V1\Transaction\TransactionCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'transactions' => new TransactionCollection($this->whenLoaded('transactions')),
            'marketing' => MarketingResource::make($this->whenLoaded('marketing')),
            'cargo' => CargoResource::make($this->whenLoaded('cargo')),
            'total_balance' => $this->whenHas('total_balance'),
            'grand_total' => $this->whenHas('grand_total'),
            'omzet' => $this->whenHas('omzet'),
            'komisi_persen' => $this->whenHas('komisi_persen'),
            'komisi_nominal' => $this->whenHas('komisi_nominal'),
        ];
    }
}
