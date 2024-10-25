<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cours = Cours::orderBy('created_at', 'desc')->limit(4)->get();
        return view('home', ['cours' => $cours]);
    }
}
