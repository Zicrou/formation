<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $cours = Cours::where('paid', 1)->orderBy('created_at', 'desc');
        return view('dashboard', [
            'cours' => $cours->paginate(),
        ]);
    }
}
