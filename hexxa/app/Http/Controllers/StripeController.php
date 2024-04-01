<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;


class StripeController extends Controller
{


    public function session(Request $request ,Post $post)
    {
        // Retrieve price and post slug from the request
        $price = $request->input('price') * 100;

        // Save post ID in the session
        \Illuminate\Support\Facades\Session::put('post_id',  $request->post_id);

        // Create Stripe session
        Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            'name' => 'gimme money!!!!',
                        ],
                        'unit_amount'  => (int) $price,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success-stripe'),
            'cancel_url'  => route('home'),
        ]);

        // Redirect user to Stripe Checkout
        return redirect()->away($session->url);
    }


    public function successStripe(Request $request )
    {

        // Retrieve the post ID from the session
        $postId = \Illuminate\Support\Facades\Session::get('post_id');

        // Find the post by ID
        $post = Post::find($postId);

        // Save the user ID and post ID in the pivot table
        $user = Auth::user();
        $user->unlockedPosts()->attach($postId);

        // Redirect the user to the post details page
        return redirect()->route('post-detail', ['post' => $post->slug]);
    }
}
