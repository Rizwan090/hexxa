<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TwoFactorAuthenticationController extends Controller
{
    /**
     * Enable two-factor authentication for the user.
     */
    public function store(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->hasEnabledTwoFactorAuthentication()) {
            return back()->with('success', 'Two-factor authentication is already enabled');
        }

        $user->enableTwoFactorAuthentication();

        return redirect()->route('account.two-factor-authentication.confirm.show');
    }
}
