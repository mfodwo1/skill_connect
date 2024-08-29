<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateServiceProviderCoordinates
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Authenticated $event): void
    {
        $user = $event->user;

        // Check if the user is a service provider
        if ($user->isServiceProvider()) {
            // Get the coordinates from the request
            $latitude = request()->input('latitude');
            $longitude = request()->input('longitude');
            // Ensure that the coordinates are available
            if ($latitude && $longitude) {
                // Update the service provider's profile with the new coordinates
                $user->profile()->update([
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ]);
            }
        }
    }
}
