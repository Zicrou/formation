@extends('admin.admin')

@section('title', $cour->exitsts ? "Editer un cours" : "Créer un cours")

@section('content')
    <h1>@yield('title')</h1>

    <div class="container">
        <div class="col-md-12 mt-4">
            <form class="vstack gap-2" action="{{ route($cour->exists ? 'admin.cours.update' : 'admin.cours.store', $cour) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method($cour->exists ? 'put' : 'post')
                <div class="row">
                    @include('shared.input', ['class' => 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $cour->title])
                    <div class="col row">
                        @include('shared.input', ['class' => 'col', 'name' => 'price', 'value' => $cour->price])
                    </div>
                </div>
                @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'name' => 'description', 'value' => $cour->description])
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label class="mb-1">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" value="{{ old('thumbnail') }}">
                        @error('thumbnail')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-5 mb-3">
                        <label class="mb-1">Video</label>
                        <input type="file" name="video" class="form-control @error('video') is-invalid @enderror" value="{{ old('video') }}">
                        @error('video')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mx-2">
                        @include('shared.checkbox', ['name' => 'disponible', 'label' => 'disponible', 'value' => $cour->disponible])
                        @include('shared.checkbox', ['name' => 'sold', 'label' => 'Vendu', 'value' => $cour->sold])
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary">
                        @if ($cour->exists)
                            Modifier
                        @else
                            Créer
                        @endif
                    </button>
                </div>
        
            </form>
        </div>
    </div>

    @if ($cour->exists)
        <div class="container">
            <div class="col-md-12 mt-4">
                <h6>Actuel photo & video du cours</h6>
                <div class="d-flex">
                    <img class="border p-2 m-2" src="{{ asset($cour->thumbnail) }}" alt="image" style="width:400px;height:275px">
                    {{-- <a href="{{ route('admin.delete.picture', $image->id) }}">Delete</a> --}}
                    <video controls src="{{ asset($cour->video) }}" style="width:200px;height:175px" style="width:400px;height:275px"></video>
                </div>
            </div>
        </div>
    @endif
@endsection