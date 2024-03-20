<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

class PayPalController extends Controller
{
    public function session(Request $request)
    {
        // Retrieve price and product name from the request
        $price = $request->input('price');
        $productName = $request->input('productname');

        // Set up PayPal environment
        $clientId = config('services.paypal.client_id');
        $clientSecret = config('services.paypal.client_secret');
        $environment = new SandboxEnvironment($clientId, $clientSecret);
        $client = new PayPalHttpClient($environment);

        // Create PayPal order
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $price
                    ],
                    "description" => $productName
                ]
            ],
            "application_context" => [
                "cancel_url" => route('home'), // Redirect URL on cancel
                "return_url" => route('paypal.success') // Redirect URL on success
            ]
        ];

        try {
            $response = $client->execute($request);
            foreach ($response->result->links as $link) {
                if ($link->rel == 'approve') {
                    return redirect()->away($link->href);
                }
            }
        } catch (\Exception $e) {
            // Handle error
            return redirect()->route('home')->with('error', 'Payment failed.');
        }
    }

    public function success(Request $request)
    {
        // Handle payment success logic
        return 'success';
    }
}
