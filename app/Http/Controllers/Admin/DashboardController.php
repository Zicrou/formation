<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use App\Models\Cart;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $likes = Like::where('user_id', Auth::user()->id)->with('cours')->orderBy('created_at', 'desc')->get();
        // dd($likes);
        $carts = Cart::where('user_id', Auth::user()->id)
        ->where('paid',  1);
        // dd($carts);
        return view('dashboard', [
            'likes' => $likes,
            'carts' => $carts->paginate(1),
        ]);
    }
}
