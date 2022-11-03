<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantScopeTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /** @test */
    public function a_model_has_a_tenant_id_on_the_migration()
    {
        //
    }
}
