<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TwoFactorAuthenticationConfirmationController extends Controller
{
    /**
     * Get the two-factor authentication confirmation view.
     */
    public function show(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        if ($user->hasEnabledTwoFactorAuthentication()) {
            return back()->with('status', 'Two-factor authentication is already enabled');
        }

        if (! $user->two_factor_secret) {
            return back()->with('status', 'Two-factor authentication is not enabled');
        }

        return view('show', [
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
            ->route('account.two-factor-authentication.recovery-codes.index')
            ->with('status', 'Two-factor authentication successfully confirmed');
    }
}
