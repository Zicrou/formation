@extends('base')

@section('title', 'Tous nos cours')
@section('content')

@include('shared.flash')
<section class="mt-4 mb-5">
    <form action="" method="get" class="gap-2">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-6 mb-3">
                    <input type="number" placeholder="Budget max" class="form-control" name="price" value="{{ $input['price'] ?? ''}}">
                </div>
                <div class="col-12 col-lg-6">
                    <input type="text" placeholder="Mot clef" class="form-control" name="title" value="{{ $input['title'] ?? ''}}">
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-center align-items-center">
                <button class="btn btn-primary px-5 py-3 d-inline-block">
                    Rechercher
                </button>
            </div>
        </div>
    </form>
</section>
<section class="mt-5 mb-5">
    <div class="container">
        <h2>Nos derniers cours :</h2>
        <div class="row">
            @forelse ($cours as $cour)
                @include('cour.card')
                @empty
                    <div class="col">
                        Aucun cours ne correspond à votre recherche
                    </div>
            @endforelse
        </div>
    </div>
</section>

<div class="my-4">
    {{ $cours->links() }}
</div>
@endsection