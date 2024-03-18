<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        $price = $request->input('price') * 100;
        $postSlug = $request->input('post_slug');

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
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
            'success_url' => route('success', ['postSlug' => $postSlug]),
            'cancel_url'  => route('home'),
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        $postSlug = $request->input('postSlug');
        $post = Post::where('slug', $postSlug)->firstOrFail();

        return view('blog-details', compact('post'));
    }
}
