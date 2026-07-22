@extends('admin.admin')
            
@section('title', "Créer un cours")

@section('content')
    <h1>@yield('title')</h1>

    <div class="container">
        <div class="col-md-12 mt-4">
            
            <form class="vstack gap-2" method="POST" action="{{ route('admin.cours.store') }}"  enctype="multipart/form-data">
                @csrf 
                @method('POST')
                @include('admin.cours.form', ['cour' => $cour, 'tags' => $tags])
            </form>
        </div>
    </div>

    @if ($cour->exists)
  
        <div class="container">
            <div class="col-md-12 mt-4">
                <h6>Actuel photo & video du cours</h6>
                <div class="d-flex justify-content-center align-items-center">
                      
                    @if($cour->thumbnail != "")
                        <img class="border p-2 m-2" src="{{ asset($cour->thumbnail) }}" alt="image" style="width:400px;height:275px">
                    @else
                        <p>Pas d'image de couverture</p>
                    @endif
                </div>
                <div class="d-flex justify-content-center align-items-center">

                    {{-- <a href="{{ route('admin.delete.picture', $image->id) }}">Delete</a> --}}
                    @if ($cour->video != "")
                        <video controls src="{{ asset($cour->video) }}" style="width:200px;height:175px" style="width:400px;height:275px"></video>
                    @else
                     <p>Pas de video</p>  
                     @endif
                </div>
            </div>
        </div>
    @endif
@endsection