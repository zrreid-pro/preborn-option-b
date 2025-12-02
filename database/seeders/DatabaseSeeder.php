<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Campaign;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                // 'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                // 'two_factor_secret' => Str::random(10),
                // 'two_factor_recovery_codes' => Str::random(10),
                // 'two_factor_confirmed_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'test_viewer@example.com'],
            [
                'name' => 'Test Viewer',
                'password' => 'password',
                'account_type' => 'viewer',
                // 'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                // 'two_factor_secret' => Str::random(10),
                // 'two_factor_recovery_codes' => Str::random(10),
                // 'two_factor_confirmed_at' => now(),
            ]
        );

        User::factory()->count(3)->create();

        $this->call([
            CampaignSeeder::class,
            DonationSeeder::class
        ]);

        for ($i = 1; $i <= 5; $i++) {
            $totalRevenue = DB::table('donations')->where('campaign_id', $i)->sum('donation_amount');

            $campaign = Campaign::find($i);

            $campaign->total_donations = $totalRevenue;

            $campaign->save();
        }
    }
}
