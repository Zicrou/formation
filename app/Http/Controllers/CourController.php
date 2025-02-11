<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursContactRequest;
use App\Http\Requests\SearchCoursRequest;
use App\Mail\CoursContactMail;
use App\Models\Cours;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class CourController extends Controller
{
    public function index(SearchCoursRequest $request)
    {
        // $cour = Cours::findOrFail(1);

        // // Check if the user has already liked this post
        // $user = Auth::user();
        
        // $like = $cour->likes()->where('user_id', $user->id)->exists();
        // // dd($like);

        $query = Cours::query()->where('disponible', '=', 1)->withCount('likes');
        
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
        $cart = Cart::where('cours_id', '=', $cour->id)
        ->where('user_id', '=', Auth::user()->id)
        ->where('paid', '=', 1)->get();
        dd($cart);
        
        $expectedSlug = $cour->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('cour.show', ['slug' => $expectedSlug, 'cour' => $cour]);
        }

        return view('cour.show', [
            'cour' => $cour,
            'cart'=> $cart,
        ]);
    }

    public function contact(Cours $cour, CoursContactRequest $request){
		Mail::send(new CoursContactMail($cour, $request->validated()));
        return back()->with('success', 'Votre demande de contact a bien été envoyé');
        //Notification::route('mail', 'john@admin.fr')->notify(new CoursContactRequest($cour, )); 
    }

    public function likeCour($courId)
    {
        // Fetch the post
        $cour = Cours::findOrFail($courId);

        // Check if the user has already liked this post
        $user = Auth::user();

        if ($cour->likes()->where('user_id', $user->id)->exists()) {
            // User has already liked, so unlike it
            $cour->likes()->where('user_id', $user->id)->delete();
            return response()->json(['status' => 'unliked', 'likesCount' => $cour->likes()->count()]);
        } else {
            // User has not liked, so like it
            $cour->likes()->create(['user_id' => $user->id]);
            return response()->json(['status' => 'liked', 'likesCount' => $cour->likes()->count()]);
        }
    }
}
