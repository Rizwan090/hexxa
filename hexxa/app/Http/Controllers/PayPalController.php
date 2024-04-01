<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function paypal(Request $request, Post $post)
    {
//        dd($request->post_id);

        // Save data to session
        Session::put('post_id', $request->post_id);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal-success'),
                "cancel_url" => route('home')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price
                    ]
                ]
            ]
        ]);
//        dd($response);
        if(isset($response['id']) && $response['id']!=null) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }

        } else {
            return redirect()->route('home');
        }
    }
    public function success(Request $request, Post $post){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        // Retrieve data from session
        $postId = Session::get('post_id');

        // Use the retrieved data as needed
        $post = Post::find($postId);
        $user = auth()->user();

        // Associate the user with the post in the pivot table
        $post->unlockedByUsers()->attach($user);

        // Clear the session after use
        Session::forget('post_id');

        return redirect()->route('post-detail', ['post' => $post->slug]);
    }


}
