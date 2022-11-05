<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::factory()->create(3);

        foreach(Tenant::all() as $tenant) {
            User::factory()->create([
                'tenant_id' => $tenant->id,
            ], 20);
        }

        foreach(User::all() as $user) {
            factory(Login::class, 5)->create([
                'user_id' => $user->id,
                'tenant_id' => $user->tenant_id,
            ]);
        }

        factory(User::class)->create([
            'tenant_id' => null,
            'email' => 'admin@admin.com',
        ]);
    }
}
