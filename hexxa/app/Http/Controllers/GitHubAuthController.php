<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GitHubAuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGitHubCallback()
    {
        try {
            $githubUser = Socialite::driver('github')->stateless()->user();
        } catch (\Exception $e) {
            // Handle Socialite exception (e.g., user denied access)
            return redirect('/')->with('error', 'GitHub authentication failed');
        }

        // Find or create the user based on the GitHub email
        $user = User::updateOrCreate(
            ['email' => $githubUser->getEmail()],
            [
                'name' => $githubUser->getName(),
                'username' => $githubUser->getNickname(),
                'email' => $githubUser->getEmail(),
                'github_id' => $githubUser->getId(),
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken,
            ]
        );

        // Log in the user
        Auth::login($user, true); // Second parameter determines if "remember me" is checked

        return redirect('/');
    }
}
