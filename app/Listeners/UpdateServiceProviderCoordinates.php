<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Validator;

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

            // Define validation rules
            $validator = Validator::make(request()->all(), [
                'latitude' => 'nullable|numeric|between:-90,90',
                'longitude' => 'nullable|numeric|between:-180,180',
            ]);

            // Check if the validation fails
            if ($validator->fails()) {
                \Log::warning('Invalid coordinates for user ID ' . $user->id, $validator->errors()->toArray());
                return;
            }

            if ($latitude && $longitude) {
                $user->profile()->update([
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ]);
            }

        }
    }
}
