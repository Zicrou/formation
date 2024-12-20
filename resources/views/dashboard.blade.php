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
                <div class="row">
                    <div class="container">
                        <h1>Liste des cours achetés</h1>
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
    <hr>
    @php
        //dd($cours)
    @endphp
    
</x-app-layout>
