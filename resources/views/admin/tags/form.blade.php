@extends('admin.admin')

@section('title', $tag->exitsts ? "Editer un tag" : "Créer un tag")

@section('content')
    <h1>@yield('title')</h1>

    <div class="container">
        <div class="col-md-12 mt-4">
            <form class="vstack gap-2" action="{{ route($tag->exists ? 'admin.tag.update' : 'admin.tag.store', $tag) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method($tag->exists ? 'put' : 'post')
                    @include('shared.input', ['class' => 'col', 'label' => 'Nom', 'name' => 'name', 'value' => $tag->name])                
                <div>
                    <button class="btn btn-primary">
                        @if ($tag->exists)
                            Modifier
                        @else
                            Créer
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection