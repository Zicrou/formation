<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CoursFormRequest;
use App\Models\Cours;
use Illuminate\Http\Request;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cours.index', [
            'cours' => Cours::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cours.form', [
            'cour' => new Cours()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoursFormRequest $request)
    {
        // $thumbnail = '';
        // $video = '';
        $data = $request->validated();
        if($image = $request->file('thumbnail')){
            $filename = $image->getClientOriginalName();
            $thumbnail = time().'_'.$filename;
            $path = 'thumbnails/cours/';
            $data['thumbnail'] = $path.$thumbnail;
            $image->move($path, $thumbnail);
        }
        if($video = $request->file('video')){
            $filename = $video->getClientOriginalName();
            $video_cours = time().'_'.$filename;
            $path = 'video_cours/';
            $data['video'] = $path.$video_cours;
            $video->move($path, $video);
        }
        //dd($data);
        $cour = Cours::create($data);
        //$image->storeAs($path, $thumbnail, 's3'); 

        return to_route('admin.cours.index')->with('success', 'Le cour a bien créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
