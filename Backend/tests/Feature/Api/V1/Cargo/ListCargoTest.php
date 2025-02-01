<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V1\Cargo;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListCargoTest extends TestCase
{
    public function testCargoSuccess()
    {
        $this->getJson('api/v1/cargos')
            ->assertOk();
    }

    public function testCargoNotFound()
    {
        $this->getJson('api/v1/cargos/9999')
            ->assertStatus(404);
    }
}
