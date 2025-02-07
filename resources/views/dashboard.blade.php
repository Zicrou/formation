<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-lg p-3 mb-5 bg-body rounded bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="container">
                    <div class="">
                        <div class="row mt-5 ms-auto">
                            <h1 class="fw-bold fs-5">Liste des cours achetés</h1>
                            @foreach ($produits as $produit)
                                <div class="col-3 d-flex">
                                    <h6 class="card-title">
                                        <a href="{{ route('cour.show', ['slug' => $produit->cours->getSlug(), 'cour' => $produit->cours->id]) }}">
                                            <u>{{ Str::limit($produit->cours->title, 40) }}</u>
                                        </a>
                                    </h6>
                                    <img src="{{ asset($produit->cours->thumbnail) }}" class="img-fluid rounded-start" style="width:200;height:200px" alt="...">
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="mt-5 d-flex justify-content-center">
                            <h1 class="fw-bold fs-5">Liste des favoris</h1>
                            @foreach ($cours as $cour)
                                <div class="col-3">
                                    <h6 class="card-title">
                                        <a href="{{ route('cour.show', ['slug' => $cour->getSlug(), 'cour' => $cour]) }}">
                                            <u>{{ Str::limit($cour->title, 40) }}</u>
                                        </a>
                                    </h6>
                                    <img src="{{ asset($cour->thumbnail) }}" class="img-fluid rounded-start" style="width:200;height:200px" alt="...">
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
