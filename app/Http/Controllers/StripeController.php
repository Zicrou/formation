<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe.index');
    }

    public function checkout(Request $request)
    {
        $cour = Cours::where('id',$request->cour)->first();
        //dd($cour);
        $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));
        //dd($stripe);
        $redirectUrl = route('stripe.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}';
        $response =  $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,
            'payment_method_types' => ['link', 'card'],
            'line_items' => [
                [
                    'price_data'  => [
                        'product_data' => [
                            'name' => $cour->title,
                        ],
                        'unit_amount'  => 100 * $cour->price,
                        'currency'     => 'EUR',
                    ],
                    'quantity'    => 1
                ],
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => false
        ]);

        // To do
        // Ajouter le cours dans la table Produit(id, user_id, cour_id, payed[boolean: default false])
        // Code...
        
        return redirect($response['url']);
    }   

    public function success(Request $request)
    {
        $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));

        $session = $stripe->checkout->sessions->retrieve($request->session_id);
        info($session);
        
        // To do
        //Update Product table and set payed column to True based on the current user and get the last line from the Product table;
        // Code...

        $successMessage = "We have received your payment request and will let you know shortly.";

        return view('stripe.success', compact('successMessage'));
    }
}
