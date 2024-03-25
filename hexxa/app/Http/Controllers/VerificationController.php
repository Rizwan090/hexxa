<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verifyTwoFactor(Request $request)
    {
        // Validate the email input
        $request->validate([
            'email' => 'required|email',
        ]);


        $user = User::where('email', $request->email)->first();

        if ($user) {

            return redirect()->route('qrcode');
        } else {

            return back()->with('error', 'Invalid email address.');
        }
    }
}
