<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V1\Payment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StorePaymentTest extends TestCase
{
    public function testValidationError(): void
    {
        $this->postJson('api/v1/payments')
            ->assertUnprocessable();
    }

    public function testStorePaymentSuccess(): void
    {
        $this->postJson('api/v1/payments', [
                'marketing_id' => '5',  
                'cargo_id' => '1',
                'total_balance' => '205000000',
            ])
            ->assertCreated();
    } 
}
