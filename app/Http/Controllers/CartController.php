<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Cours;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::where("user_id", Auth::user()->id)->where('paid', 0)->with('cours')->orderBy("id","desc")->paginate(10);
        // dd($carts->first()->cours->title);
        return view("panier.index", ["carts" => $carts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cours =  Cours::where("id", $request->cour)->first();
        $cart = Cart::where("cours_id", $cours->id)->where("user_id", Auth::user()->id)->first();
        
        if(!$cart){
            Cart::create([
                'cours_id' => $cours->id,
                'user_id' => Auth::user()->id,
                'paid' => false,
            ]);
        }
        return redirect()->route('cour.index')->with('success','Le cours a été mis dans le panier');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $cart = Cart::where('cours_id', $request->cours)->with('cours')->where('user_id', Auth::user()->id)->first();
        // dd($cart->cours->id);
        if ($cart) {
            $cart->delete();
        }
        // $cart = Cart::where('id', $id)->first();
        // if (File::exists($cart->image)) {
        //     File::delete($cart->image);
        // }
        //$cart->delete();
        return to_route('cart.index')->with('success', 'Le produit a été supprimé');
    }
}
