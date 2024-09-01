<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckServiceProviderProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->role === 'service_provider') {
            // Check if the profile is incomplete
            if (is_null($user->profile)) {
                return redirect()->route('create.profile.service')->with('status', 'Please complete your profile.');
            }
        }

        return $next($request);
    }
}
