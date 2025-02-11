<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 container">
            <div class="shadow-lg p-3 mb-5 bg-body rounded bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="container">
                    <div class="">
                        <div class="row mt-5 ms-auto">
                            <h1 class="fw-bold fs-5">Liste des cours achetés</h1>
                            
                            @foreach ($carts as $cart)
                                <div class="col-3 d-flex">
                                    <h6 class="card-title">
                                        <a href="{{ route('cour.show', ['slug' => $cart->cours->getSlug(), 'cour' => $cart->cours->id]) }}">
                                            <u>{{ Str::limit($cart->cours->title, 40) }}</u>
                                        </a>
                                    </h6>
                                    <img src="{{ asset($cart->cours->thumbnail) }}" class="img-fluid rounded-start" style="width:200;height:200px" alt="...">
                                </div>
                            @endforeach
                        </div>
                        <div class="my-4">
                            {{ $carts->links() }}
                        </div>
                        <hr>
                        
                        <div class="mt-5 d-flex justify-content-center">
                            <h1 class="fw-bold fs-5">Liste des favoris</h1>
                            @foreach ($likes as $like)
                                
                                <div class="col-3">
                                    <h6 class="card-title">
                                        <a href="{{ route('cour.show', ['slug' => $like->cours->getSlug(), 'cour' => $like->cours->title]) }}">
                                            <u>{{ Str::limit($like->cours->title, 40) }}</u>
                                        </a>
                                    </h6>
                                    <img src="{{ asset($like->cours->thumbnail) }}" class="img-fluid rounded-start" style="width:200;height:200px" alt="...">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    
</x-app-layout>
