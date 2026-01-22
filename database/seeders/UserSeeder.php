<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Landlord;
use App\Models\Trader;
use App\Models\Property;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $password = 'password';

        // Create 3 Landlords
        $landlord_emails = ['landlord1@test.com', 'landlord2@test.com', 'landlord3@test.com'];
        foreach ($landlord_emails as $email) {
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => str_replace('@test.com', '', $email),
                    'password' => bcrypt($password),
                    'role' => 'landlord',
                ]
            );
            $landlord = Landlord::firstOrCreate(['user_id' => $user->id]);

            // Create 2-3 properties for each landlord
            Property::firstOrCreate(
                ['landlord_id' => $landlord->id, 'name' => "{$user->name} - Downtown Apt"],
                [
                    'address' => '123 Main Street, Downtown',
                    'type' => 'residential',
                    'rent_amount' => 1500,
                    'bedrooms' => 2,
                    'bathrooms' => 1,
                    'description' => 'Cozy apartment in the heart of downtown',
                    'status' => 'available',
                ]
            );

            Property::firstOrCreate(
                ['landlord_id' => $landlord->id, 'name' => "{$user->name} - Suburban House"],
                [
                    'address' => '456 Oak Avenue, Suburbs',
                    'type' => 'residential',
                    'rent_amount' => 2200,
                    'bedrooms' => 3,
                    'bathrooms' => 2,
                    'description' => 'Beautiful family home with garden',
                    'status' => 'rented',
                ]
            );
        }

        // Create 10 Traders
        $trader_count = 0;
        while ($trader_count < 10) {
            $trader_count++;
            $user = User::firstOrCreate(
                ['email' => "trader{$trader_count}@test.com"],
                [
                    'name' => "Trader {$trader_count}",
                    'password' => bcrypt($password),
                    'role' => 'trader',
                ]
            );

            $trader = Trader::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'approval_status' => $trader_count <= 5 ? 'pending' : 'approved',
                ]
            );
        }

        // Create 1 Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt($password),
                'role' => 'admin',
            ]
        );
    }
}
