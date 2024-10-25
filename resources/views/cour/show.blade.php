@extends('base')

@section('title', Str::limit($cour->title, 20))

@section('content')
    <style>
        .carousel-indicators img {
            width: 70px;
            display: block;
        }

        .carousel-indicators button {
            width: max-content !important;
        }
    </style>
    <div class="container mt-4">

        <hr>

        <div class="mt-4">
            <div class="row">
                <div class="text-center text-primary fw-bold" style="font-size: 4rem;">
                    <h1 class=""><strong>{{ $cour->title }}</strong></h1>
                    {{ number_format($cour->price, thousands_separator: ' ') }}£
                </div>
                <div class="col-md-12">
                    <div class="carousel slide" id="carouselDemo" data-bs-wrap="true" data-bs-ride="carousel">
                        {{-- <img src="{{ asset($cour->thumbnail) }}" alt="" style="width:30rem;"/> --}}
                        <video controls src="{{ asset($cour->video) }}" style="width:50rem;"></video>
                    </div>
                </div>
                <div class="mt-4">
                    <p>{!! nl2br($cour->description) !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h4>{{ __('Interested in this classe :title ?', ['title' => $cour->title]) }}</h4>

                    <form action="{{ route('cour.contact', $cour)}}" method="post" class="vstack gap-3">
                        @csrf

                        <div class="row">
                            @include('shared.input', [
                                'class' => 'col',
                                'name' => 'firstname',
                                'label' => 'Prénom',
                                'value' => 'John',
                            ])
                            @include('shared.input', [
                                'class' => 'col',
                                'name' => 'lastname',
                                'label' => 'Nom',
                                'value' => 'Doe',
                            ])
                        </div>

                        <div class="row">
                            @include('shared.input', [
                                'class' => 'col',
                                'name' => 'phone',
                                'label' => 'Téléphone',
                                'value' => '0000000000',
                            ])
                            @include('shared.input', [
                                'type' => 'email',
                                'class' => 'col',
                                'name' => 'email',
                                'label' => 'Email',
                                'value' => 'john@doe.fr',
                            ])
                        </div>

                        @include('shared.input', [
                            'type' => 'textarea',
                            'class' => 'col',
                            'name' => 'message',
                            'label' => 'Votre message',
                            'value' => 'Description',
                        ])
                        <div>
                            <button class="btn btn-primary">
                                Nous contacter
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-4">
                    <h2>Tags</h2>
                    <ul class="list-group">
                        @foreach ($cour->tags as $tag)
                            <li class="list-group-item">{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="mt-4 row">
            <div class="col">
                <h2>Les plus vendus</h2>
                <table class="table table-striped">
                    <tr>
                        <td>Price</td>
                        <td>{{ $cour->price }}</td>
                    </tr>
                    <tr>
                        <td>Nombre de fois vendu</td>
                        <td>{{ $cour->price }}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>{{ $cour->price }}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>{{ $cour->price }}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                            {{ $cour->price }}<br />
                            {{ $cour->city }} {{ $cour->price }}
                        </td>
                    </tr>
                </table>
            </div>
            
        </div>
    </div>

@endsection
