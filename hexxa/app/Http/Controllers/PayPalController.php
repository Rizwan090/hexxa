<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function paypal(Request $request)
    {
      $provider= new paypalClient;
        $provider->setApiCredentials(config('paypal'));
       $paypalToken =  $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success'),
                "cancel_url" => route('cancel')
            ],
    "purchase_units" => [
      [
          "amount" => [
          "currency_code" => "USD",
          "value" => $request->price,
        ]
      ]
    ]
        ]);
//dd($response);
        if(isset($response['id']) && $response['id'] !=null){
          foreach ($response['links'] as $link){
              if($link['rel'] === 'approve'){
                  return redirect()->away($link['href']);
              }
          }
        } else {
            return redirect()->route('home');
        }
    }


    public function success(Request $request)
    {
        $provider = new paypalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken =  $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        // Retrieve the post ID from the session
        $postId = \Illuminate\Support\Facades\Session::get('post_id');

        // Find the post by ID
        $post = Post::find($postId);

        // Check if the post exists
        if (!$post) {
            return redirect()->route('home')->with('error', 'Post not found.');
        }

        // Save the user ID and post ID in the pivot table
        $user = Auth::user();
        $user->unlockedPosts()->attach($postId);

        // Redirect the user to the post details page
        return redirect()->route('post-detail', ['post' => $post->slug]);
    }



}
