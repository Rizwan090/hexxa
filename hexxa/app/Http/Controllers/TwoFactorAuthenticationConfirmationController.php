<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class TwoFactorAuthenticationConfirmationController extends Controller
{
    /**
     * Get the two-factor authentication confirmation view.
     */
    public function qshow(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        if ($user->hasEnabledTwoFactorAuthentication()) {
            return back()->with('success', 'Two-factor authentication is already enabled');
        }

        if (! $user->two_factor_secret) {
            return back()->with('success', 'Two-factor authentication is not enabled');
        }

        return view('2fa.show', [
            'qrCodeSvg' => $user->twoFactorQrCodeSvg(),
            'setupKey' => $user->two_factor_secret,
        ]);
    }

    /**
     * Confirm two-factor authentication for the user.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => ['required', 'string'],
        ]);

        $request->user()->confirmTwoFactorAuthentication($request->code);

        return redirect()
            ->route('home')
            ->with('success', 'Two-factor authentication successfully confirmed');
    }

    /**
     * Disable two-factor authentication for the user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->user()->disableTwoFactorAuthentication();

        return back()->with('success', 'Two-factor authentication disabled successfully');
    }
}
