@extends('base')

@section('content')

    <div class="bg-light p-1 mb-2 text-center">
        <div class="container">
            <h1 class="font-bold text-xl mb-1">Agence lorem ipsum</h1>
            <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.</p>
        </div>
    </div>

    <div class="container">
        <h2>Nos derniers biens :</h2>
        <div class="row gap-2 mb-[120px]">
            @foreach ($cours as $cour)
                <div class="col-12">
                    @include('cour.card')
                </div>
            @endforeach
        </div>
    </div>

@endsection