<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V1\Transaction;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListTransactionTest extends TestCase
{

    public function testTransactionSuccess()
    {
        $this->getJson('api/v1/transactions')
            ->assertOk();
    }

    public function testTransactionNotFound(){
        $this->getJson('api/v1/transactions/999')
            ->assertStatus(404);
    }
    
}
