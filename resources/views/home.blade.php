@extends('base')

@section('content')

    <div class="" style="max-width: 100%;">
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
            <div class="row d-flex justify-content-between mb-12">
                <div class="col-md-3">
                    <img src="{{ asset($cours->first()->thumbnail) }}" class="rounded-circle" alt="..." style="width:360px;height:350px">
                    <h2>{{ $cours->first()->title }}</h2>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Fuga consequatur inventore reiciendis maxime, dolorem, blanditiis, architecto accusamus illum beatae placeat itaque repudiandae ducimus?</p>
                </div>
                <div class="col-md-3 rounded-circle">
                    <img src="{{ asset($cours->first()->thumbnail) }}" class="rounded-circle" alt="..." style="width:360px;height:350px">
                    <h2>{{ $cours->first()->title }}</h2>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Fuga consequatur inventore reiciendis maxime, dolorem, blanditiis, architecto accusamus illum beatae placeat itaque repudiandae ducimus?</p>
                </div>
                <div class="col-md-3 rounded-circle">
                    <img src="{{ asset($cours->first()->thumbnail) }}" class="rounded-circle" alt="..." style="width:360px;height:350px">
                    <h2>{{ $cours->first()->title }}</h2>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Fuga consequatur inventore reiciendis maxime, dolorem, blanditiis, architecto accusamus illum beatae placeat itaque repudiandae ducimus?</p>
                </div>
            </div>
        </div>
        
        <div class="container" style="padding: 2rem;">
            <div class="row d-flex mt-5  mb-12">
                <div class="col-md-7 me-auto p-2">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum obcaecati sequi sunt veritatis ab necessitatibus, quam quae, omnis repellat iste, hic consequatur eos reiciendis tempora commodi nam! Dolor, soluta deleniti.
                </div>
                <div class="col-md-3 p-2 ">
                    <video src="{{ asset($cours->first()->video) }}" class="img-fluid" alt="..." controls>
                </div>
            </div>
        </div>
       
        <div style="">
            <div class="row d-flex justify-content-center bg-warning" style="width:100%%;padding: 2rem;margin:0">
                <div class="col-md-5" style="">
                    <img src="{{ asset($cours[5]->thumbnail) }}" class="" alt="..." style="width:360px;height:330px">
                </div>
                <div class="col-md-5  d-flex align-items-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque harum quis non. Qui quo molestiae, quos fugit quod porro tempore velit obcaecati deleniti adipisci, autem deserunt assumenda distinctio, nulla necessitatibus.</p>
                </div>
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
    </div>

@endsection