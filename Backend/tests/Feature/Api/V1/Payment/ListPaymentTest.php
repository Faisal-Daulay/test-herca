<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V1\Payment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListPaymentTest extends TestCase
{
    public function testPaymentsSuccess()
    {
        $this->getJson('api/v1/payments')
            ->assertOk();
    }

    public function testPaymentNotFound()
    {
        $this->getJson('api/v1/payments/9999')
            ->assertStatus(404);
    }
}
