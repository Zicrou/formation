@extends('base')

@section('title', 'Mon Panier')

@section('content')

    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="d-flex justify-content-center align-items-center">
                        <h1 class="">@yield('title')</h1>
                    </div>
                </div>
                <div class="col-12 col-lg-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Cover</th>
                                <th>Titre</th>
                                <th>Prix</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carts as $cart)
                                <tr>
                                    <td class="m-0"><img src="{{ asset($cart->cours->thumbnail) }}" alt="" style="width:2.9rem;height: auto"></td>
                                    {{-- <td><video controls src="{{ asset($cart->video) }}" style="width:200px;height:175px"></video></td> --}}
                                    <td>{{ $cart->cours->title }}</td>
                                    <td>{{ number_format($cart->cours->price, thousands_separator: ' ') }}</td>
                                    <td class="d-flex gap-2 justify-content-end">
                                        <a href="{{ route('stripe.checkout', ['cour' => $cart->cours]) }}" class="btn btn-primary">Acheter</a>
                                        <form action="{{ route('cart.delete', $cart->cours->id) }}" method="post">
                                            @csrf
                                            @method("post")
                                            <input type="hidden" name="cours" id="cours" value="{{ $cart->cours->id}}">
                                            <button class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Votre panier est vide.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    
    

    {{ $carts->links() }}
@endsection