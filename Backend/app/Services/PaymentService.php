<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Resources\Api\V1\Payment\PaymentResource;
use App\Models\Cargo;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

class PaymentService
{
    public function all(): JsonResponse
    {
        $payments = Payment::with(['transactions', 'marketing', 'cargo'])->latest()->paginate(12);

        $commissionResults = [];

        foreach ($payments as $payment) {
            $marketing = $payment->marketing;
            $month = $payment->created_at->format('F');

            $omzet = is_numeric($payment->grand_total)
            ? $payment->grand_total
            : $payment->transactions->sum('amount');

            $commissionPercentage = 0;
            if ($omzet >= 500000000) {
                $commissionPercentage = 10;
            } elseif ($omzet >= 200000000) {
                $commissionPercentage = 5;
            } elseif ($omzet >= 100000000) {
                $commissionPercentage = 2.5;
            }

            $commissionNominal = ($commissionPercentage / 100) * $omzet;

            $formattedOmzet = number_format($omzet, 0, ',', '.');
            $formattedCommissionNominal = number_format($commissionNominal, 0, ',', '.');

            $commissionResults[] = [
                'marketing' => $marketing->name,
                'month' => $month,
                'revenue' => $formattedOmzet,
                'commission_percentage' => $commissionPercentage,
                'commission_nominal' => $formattedCommissionNominal,
            ];
        }

        return response()->json([
            'data' => new LengthAwarePaginator(
                $commissionResults,
                $payments->total(),
                $payments->perPage(),
                $payments->currentPage(),
                ['path' => request()->url(), 'query' => request()->query()]
            ),
        ]);
    }

    public function store(array $data): PaymentResource
    {
        $cargo_id = $data['cargo_id'];
        $total_balance = $data['total_balance'];

        $cargo = Cargo::find($cargo_id);
        $cargo_fee = $cargo->cargo_fee;

        $grand_total = $total_balance + $cargo_fee;

        $data['grand_total'] = $grand_total;

        $payment = Payment::create($data);
        $payment->load('marketing', 'cargo');

        $payment->transactions()->create([
            'date' => now(),
        ]);

        return PaymentResource::make($payment);
    }
}
