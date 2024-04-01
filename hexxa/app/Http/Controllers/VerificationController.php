<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VerificationController extends Controller
{
    public function verifyTwoFactor(Request $request)
    {
        // Validate the email input
        $request->validate([
            'email' => 'required|email',
        ]);

        // Get the authenticated user
        $authenticatedUser = Auth::user();

        // Check if the email entered matches the authenticated user's email
        if ($authenticatedUser && $authenticatedUser->email == $request->email) {
            // If the email matches, redirect to the QR code page
            return redirect()->route('qr-show');
        } else {
            // If the email doesn't match, redirect back with an error message
            return back()->with('error', 'Invalid email address.');
        }
    }
}
