<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $cours = Cours::where('disponible', 1)->orderBy('created_at', 'desc')->get();
        
        $produits = Product::where('user_id', '=', Auth::user()->id)
        ->where('paid', '=', 1)->get();
        // dd($produits);
        return view('dashboard', [
            'cours' => $cours,
            'produits' => $produits,
        ]);
    }
}
