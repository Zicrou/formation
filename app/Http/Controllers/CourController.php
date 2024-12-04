<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursContactRequest;
use App\Http\Requests\SearchCoursRequest;
use App\Mail\CoursContactMail;
use App\Models\Cours;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class CourController extends Controller
{
    public function index(SearchCoursRequest $request)
    {
        Cours::create([
            'title' => 'Title',
            'description' => 'Description',
            'thumbnail' => 'cour_thumbnail.png',
            'video' => 'cour_video.mp4',
            'price' => '50000',
            'disponible' => '1',
            'sold' => '1',
        ]);
        $query = Cours::query()->where('disponible', '=', 1);
        
        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }
        // $product = Product::where('cours_id', '=', $cour->id)
        // ->where('user_id', '=', Auth::user()->id)
        // ->where('paid', '=', 1)->get();
        
        //$result = $query->created_at->diffForHumans()->get();
        return view('cour.index', [
            'cours' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Cours $cour)
    {
        $expectedSlug = $cour->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('cour.show', ['slug' => $expectedSlug, 'cour' => $cour]);
        }

        return view('cour.show', [
            'cour' => $cour
        ]);
    }

    public function contact(Cours $cour, CoursContactRequest $request){
		Mail::send(new CoursContactMail($cour, $request->validated()));
        return back()->with('success', 'Votre demande de contact a bien été envoyé');
        //Notification::route('mail', 'john@admin.fr')->notify(new CoursContactRequest($cour, )); 
    }
}
