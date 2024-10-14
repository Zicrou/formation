@extends('admin.admin')

@section('title', $cour->exitsts ? "Editer un cours" : "Créer un cours")

@section('content')
    <h1>@yield('title')</h1>

        <div x-data="uploader">
            
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
                    <input type="file" x-ref="thumbnail" name="thumbnail" class="form-control" value="{{ old('thumbnail') }}">
                    @error('thumbnail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-5 mb-3">
                    <label class="mb-1">Video</label>
                    <input type="file" x-ref="video" name="video" class="form-control" value="{{ old('video') }}">
                    @error('video')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @include('shared.checkbox', ['name' => 'disponible', 'label' => 'disponible', 'value' => $cour->disponible])
                @include('shared.checkbox', ['name' => 'sold', 'label' => 'Vendu', 'value' => $cour->sold])
            </div>      
            <div>
                <button x-on:click='upload' class="btn btn-primary">
                    @if ($cour->exists)
                        Modifier
                    @else
                        Upload
                    @endif
                </button>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
    <script>
        document.addEventListener('alpine:init', ()=> {
            
            Alpine.data('uploader', ()=>({
                upload(){
                    alert('will work');
                }
            }))
        })
    </script>
    @endsection