<?php

namespace Database\Seeders;

use App\Models\Premission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = Role::query()->create([
            'title' => 'admin'
        ]);

        $admin->premissions()->attach(Premission::all());

        Role::query()->insert([
            'title' => 'user'
        ]);
    }
}
