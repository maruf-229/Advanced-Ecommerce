<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function stripeOrder(Request $request){

        \Stripe\Stripe::setApiKey('sk_test_51LUnrSIuoDeyhcEqdQ6puquZFv60q51l4AwA4SviyWCQEBgJya3P1cvAAJSTjh1aQ8wVncNAN1D1ArGeLLYi8M5M00Luoy0jP3');

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => 999*100,
            'currency' => 'usd',
            'description' => "MH's Online Store",
            'source' => $token,
            'metadata' => ['order_id' => '6735'],
        ]);

        dd($charge);
    }
}
