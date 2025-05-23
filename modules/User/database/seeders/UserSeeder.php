<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Modules\Role\App\Models\Role;
use Modules\User\App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = 'password';

        $data = [
            'first_name' => 'Demo',
            'last_name' => 'User',
            'username' => 'demo',
            'phone' => '+2340000000001',
            'email' => 'demo@example.com',
            'password' => $password,
        ];

        $user = User::firstOrCreate(Arr::only($data, ['username', 'phone', 'email']), $data);

        $user->assignRole((Role::findOrCreate('user')));
    }
}
