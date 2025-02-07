@extends('base')

@section('title', Str::limit($cour->title, 20))

@section('content')
<section class="container">
    
    @if ($errors->any())
        <div class="alert alert-danger mt-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="row mt-5">
        <div class="col-md-8">
            <video controls src="{{ asset($cour->video) }}" class="w-100"></video>
            <h1 class="text-primary text-center">{{ $cour->title }}</h1>
            <div class="mt-4">
                <p>{!! nl2br($cour->description) !!}</p>
            </div>
        </div>

        <div class="col-md-4 mt-5">
            <div class="d-flex justify-content-center align-items-center text-center text-primary fw-bold " style="">
                @if ($produit)
                    <span class="px-3">{{ number_format($cour->price, thousands_separator: ' ') }}£</span>
                    <a href="{{ route('stripe.checkout', ['cour' => $cour]) }}" class=" btn btn-outline-primary">Commander</a>
                @endif
                {{-- <div class="form-group mt-5">
                    <form action="{{ route('stripe.checkout', $cour) }}" method="POST">
                        @csrf
                        <input type="hidden" name="cour" value="{{$cour}}">
                        <button class="btn btn-primary col-md-3" type="submit">Acheter</button>
                    </form> 
                </div> --}}
            </div>
            <div class="">
                {{-- <h4>{{ __('Interested in this classe :title ?', ['title' => $cour->title]) }}</h4> --}}
                {{-- <form action="{{ route('cour.contact', $cour)}}" method="post" class="vstack gap-3">
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
                </form> --}}
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
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
        <div class="col-md-4">
            <h2>Tags</h2>
            <ul class="list-group">
                @foreach ($cour->tags as $tag)
                    <li class="list-group-item">{{ $tag->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

@endsection
