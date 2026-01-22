<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Define permissions (action-based)
        $permissions = [
            // Landlord
            'property.view', 'property.create', 'property.update', 'property.delete',
            'certificate.view', 'certificate.upload', 'certificate.update', 'certificate.delete',
            'portfolio.view', 'trader.view', 'trader.request',

            // Trader
            'profile.view', 'profile.update',
            'job.view', 'job.accept', 'job.reject',

            // Admin
            'admin.access', 'landlord.manage', 'trader.manage', 'property.manage', 'certificate.manage',
            'trader.approve', 'trader.reject',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $landlord = Role::firstOrCreate(['name' => 'landlord']);
        $trader = Role::firstOrCreate(['name' => 'trader']);

        // Assign permissions to landlord
        $landlord->givePermissionTo([
            'property.view', 'property.create', 'property.update', 'property.delete',
            'certificate.view', 'certificate.upload', 'certificate.update', 'certificate.delete',
            'portfolio.view', 'trader.view', 'trader.request',
        ]);

        // Assign permissions to trader
        $trader->givePermissionTo([
            'profile.view', 'profile.update',
            'job.view', 'job.accept', 'job.reject',
        ]);

        // Admin gets everything
        $admin->givePermissionTo(Permission::all());

        // Optionally make the first user an admin (if exists)
        $first = User::first();
        if ($first) {
            $first->assignRole('admin');
        }
    }
}
