<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $token = $request->stripeToken;

        $charge = Charge::create([
            'amount' => 999, // Amount in cents
            'currency' => 'usd',
            'source' => $token,
            'description' => 'Payment',
        ]);

        // Process the payment and perform any necessary actions
        // For example, save payment details to your database

        return redirect()->back()->with('success', 'Payment successful!');
    }
}