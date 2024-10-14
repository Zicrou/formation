<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CoursFormRequest;
use App\Http\Requests\Admin\CoursUpdateFormRequest;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        //dd($request->validated());
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
            $video->move($path, $video_cours);
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
    public function edit(Cours $cour)
    {
        return view('admin.cours.form', [
            'cour' => $cour
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoursUpdateFormRequest $request, Cours $cour)
    {
        $data = $request->validated();
        if($image = $request->file('thumbnail') ){
            $filename = $image->getClientOriginalName();
            $thumbnail = time().'_'.$filename;
            if (File::exists($cour->thumbnail)) {
                File::delete($cour->thumbnail);
            }
            $path = 'thumbnails/cours/';
            $data['thumbnail'] = $path.$thumbnail;
            $image->move($path, $thumbnail);
        }
        if($video = $request->file('video')){
            $filename = $video->getClientOriginalName();
            $video_cours = time().'_'.$filename;
            if (File::exists($cour->video)) {
                File::delete($cour->video);
            }
            $path = 'video_cours/';
            $data['video'] = $path.$video_cours;
            $video->move($path, $video_cours);
        }
        
        $cour->update($data);
        return to_route('admin.cours.index')->with('success', 'Le cours a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cours $cour)
    {
        $cour->delete();
        if (File::exists($cour->video)) {
            File::delete($cour->video);
        }
        return to_route('admin.cours.index')->with('success', 'Le cours a bien été supprimé');
    }

    public function extractData(){

    }
    
}
