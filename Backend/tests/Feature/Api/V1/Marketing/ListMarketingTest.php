<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V1\Marketing;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListMarketingTest extends TestCase
{
    public function testMarketingSuccess()
    {
        $this->getJson('api/v1/marketings')
            ->assertOk();
    }

    public function testMarketingNotFound(){
        $this->getJson('api/v1/marketings/999')
            ->assertStatus(404);
    }
}
