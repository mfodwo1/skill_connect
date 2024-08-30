<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::factory(20)->create();

        // Seed Users and Profiles
        $users = \App\Models\User::factory(100)->create()->each(function ($user) use ($categories) {
            $profile = \App\Models\Profile::factory()->create(['user_id' => $user->id]);

            if ($user->isServiceProvider()) {
                $services = \App\Models\Service::factory(10)->create([
                    'provider_id' => $user->id,
                    'category' => $categories->random()->id,
                ]);

                // Seed Bookings and Reviews related to those services
                $services->each(function ($service) use ($user) {
                    $booking = \App\Models\Booking::factory()->create([
                        'service_id' => $service->id,
                        'provider_id' => $service->provider_id,
                        'seeker_id' => \App\Models\User::where('role', 'service_seeker')->inRandomOrder()->first()->id,
                    ]);

                    \App\Models\Review::factory()->create([
                        'booking_id' => $booking->id,
                        'seeker_id' => $booking->seeker_id,
                        'provider_id' => $booking->provider_id,
                    ]);

                });
            }
        });

        // Seed Messages separately
        \App\Models\Message::factory(200)->create();



//        // User::factory(10)->create();
//
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
