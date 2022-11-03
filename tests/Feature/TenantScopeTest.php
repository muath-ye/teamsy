<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class TenantScopeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_model_has_a_tenant_id_on_the_migration()
    {
        $now = now();
        $this->artisan('make:model Test -m');

        // find the migration file
        $filename = $now->year.'_'.$now->format('m').'_'.$now->format('d').'_'.$now->format('H').$now->format('i').$now->format('s').'_create_tests_table.php';
        $this->assertTrue(File::exists(database_path('migrations/'.$filename)));
        // check tenant_id on migration file
        $this->assertStringContainsString(
            '$table->foreignIdFor(Tenant::class)->index()',
            File::get(database_path('migrations/'.$filename))
        );
        // clean up
        File::delete(database_path('migrations/'.$filename));
        File::delete(app_path('Models/Test.php'));
    }

    /** @test */
    public function a_user_can_only_see_users_on_the_same_tenant()
    {
        // create two tenants
        $tenant_1 = Tenant::factory()->create();
        $tenant_2 = Tenant::factory()->create();
        // create users for each tenant for example 10 users for each tenant
        $user = User::factory()->create(['tenant_id' => $tenant_1->id]);
        User::factory()->count(9)->create(['tenant_id' => $tenant_1->id]);
        User::factory()->count(10)->create(['tenant_id' => $tenant_2->id]);
        // login one users
        Auth::login($user);
        // assert logged in user should only see 10 users
        $this->assertEquals(10, User::count());
    }

    /** @test */
    public function a_user_can_only_creates_users_on_the_his_tenant()
    {
        // create two tenants
        $tenant = Tenant::factory()->create();
        // create users for each tenant for example 10 users for each tenant
        $user = User::factory()->create(['tenant_id' => $tenant->id]);
        // login one users
        Auth::login($user);
        // create new user
        $newUser = User::factory()->create();
        // assert logged in user should only see 10 users
        $this->assertEquals($user->tenant_id, $newUser->tenant_id);
    }

    /** @test */
    public function a_user_can_only_creates_users_on_the_his_tenant_even_if_other_tenant_provided()
    {
        // create two tenants
        $tenant = Tenant::factory()->create();
        $tenant_2 = Tenant::factory()->create();
        // create users for each tenant for example 10 users for each tenant
        $user = User::factory()->create(['tenant_id' => $tenant->id]);
        // login one users
        Auth::login($user);
        // create new user
        $newUser = User::factory()->create(['tenant_id' => $tenant_2->id]);
        // assert logged in user should only see 10 users
        $this->assertEquals($user->tenant_id, $newUser->tenant_id);
    }
}
