<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TwoFactorAuthenticationController extends Controller
{
    /**
     * Enable two-factor authentication for the user.
     */

    public function store(Request $request): RedirectResponse
    {
        // Get the authenticated user
        $user = $request->user();

        // Check if the user has already enabled two-factor authentication
        if ($user->hasEnabledTwoFactorAuthentication()) {
            return back()->with('success', 'Two-factor authentication is already enabled');
        }

        // Validate the email in the request
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the email in the request matches the email of the authenticated user
        if ($user->email === $request->email) {
            // Enable two-factor authentication for the user
            $user->enableTwoFactorAuthentication();

            // Redirect to the page for confirming two-factor authentication
            return redirect()->route('qr-show');
        } else {
            // If the email doesn't match, redirect back with an error message
            return back()->with('error', 'Invalid email address.');
        }
    }
}
