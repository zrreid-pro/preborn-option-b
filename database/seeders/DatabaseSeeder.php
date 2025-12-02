<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'test_manager@example.com'],
            [
                'name' => 'Test Manager',
                'password' => 'password',
                'account_type' => 'manager',
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'test_viewer@example.com'],
            [
                'name' => 'Test Viewer',
                'password' => 'password',
                'account_type' => 'viewer',
                'email_verified_at' => now(),
            ]
        );

        User::factory()->count(3)->create();

        $this->call([
            CampaignSeeder::class,
            DonationSeeder::class
        ]);

        // $totalRevenue = DB::table('donations')->sum('donation_amount');
    }
}
