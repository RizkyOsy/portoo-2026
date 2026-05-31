<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'view_any_portfolio_profile',
            'view_portfolio_profile',
            'create_portfolio_profile',
            'update_portfolio_profile',
            'delete_portfolio_profile',
            'delete_any_portfolio_profile',

            'view_any_project',
            'view_project',
            'create_project',
            'update_project',
            'delete_project',
            'delete_any_project',

            'view_any_contact_message',
            'view_contact_message',
            'create_contact_message',
            'update_contact_message',
            'delete_contact_message',
            'delete_any_contact_message',
        ];

        foreach ($permissions as $permission) {
            Permission::query()->firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        $superAdminRole = Role::query()->firstOrCreate([
            'name' => 'super_admin',
            'guard_name' => 'web',
        ]);

        $adminRole = Role::query()->firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $allPermissions = Permission::query()
            ->where('guard_name', 'web')
            ->get();

        $superAdminRole->syncPermissions($allPermissions);
        $adminRole->syncPermissions($allPermissions);

        $user = User::query()->updateOrCreate(
            [
                'email' => 'admin@admin.com',
            ],
            [
                'name' => 'Admin',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        );

        $user->syncRoles([
            $superAdminRole,
            $adminRole,
        ]);

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}