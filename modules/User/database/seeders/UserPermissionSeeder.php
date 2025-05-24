<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Permission\App\Models\Permission;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'users',
            'users.create',
            'users.index',
            'users.show',
            'users.edit',
            'users.delete',
            'users.delete.trash',
            'users.delete.restore',
            'users.delete.permanent',
            // Admin
            'admin.dashboard',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }
    }
}
