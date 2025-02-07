<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        
        $product = Product::where('cours_id', '=', $cour->id)
        ->where('user_id', '=', Auth::user()->id)
        ->where('paid', '=', 1)->first();
        
        if ($product->isNotEmpty()) {
            return back()->withErrors(['msg' => 'Vous avez déjà acheté ce cours']);
            // return back()->with(['msg' => 'Vous avez déja acheté ce cours']);
        } else {
            $stripe = new \Stripe\StripeClient(config('stripe.stripe_secret_key'));
            $redirectUrl = route('stripe.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}';
            $response =  $stripe->checkout->sessions->create([
                'success_url' => $redirectUrl,
                'payment_method_types' => ['link', 'card'],
                'line_items' => [
                    [
                        'price_data'  => [
                            'product_data' => [
                                'name' => $cour->title, // Refactor to produit->cour->title, Relation already done
                            ],
                            'unit_amount'  => 100 * $cour->price, // Refactor to produit->cour->price,  Relation already done
                            'currency'     => 'EUR',
                        ],
                        'quantity'    => 1
                    ],
                ],
                'mode' => 'payment',
                'allow_promotion_codes' => false
            ]);
            Product::create([
                'cours_id' => $cour->id,
                'user_id' => Auth::user()->id,
                'paid' => false,
            ]);
        }
        

        // To do
        // Ajouter le cours dans la table Commande(id, user_id, cour_id, payed[boolean: default false])
        
        
        
        return redirect($response['url']);
    }   

    public function success(Request $request)
    {
        // dd($request->all());
        $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));
        //dd('ok');
        $session = $stripe->checkout->sessions->retrieve($request->session_id);
        info($session);
        //Update Product table and set payed column to True based on the current user and get the last line from the Product table;
        $product = Product::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->first();
        // dd($product);
        $cour = Cours::where('id', $product->cours_id)->first();
        if($product->paid == false)
        {
            $product->update(['paid' => true]);
            
            
            $cour->update(['sold' => $cour->sold +1]);
        }
        
        $successMessage = "We have received your payment request and will let you know shortly.";
        $products = Product::where('user_id',Auth::user()->id)->where('paid', 1)->orderBy('id', 'DESC')->get();
        // return view('stripe.success', compact('successMessage'));
        return redirect()->route('dashboard', ['cours' => $products])->with('success', $successMessage);
        // return view('dashboard', [
        //     'cours' => $cours->paginate(),
        // ]);
    }
}
