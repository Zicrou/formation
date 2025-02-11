@extends('base')

@section('content')

<section>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-lg-12 mb-1">
                <img src="{{ asset('Linux.jpg') }}" class="img-fluid w-100" style="max-height: 350px;" alt="Banner Image">
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-lg-12 mb-1 text-center">
                <h1 class="display-4 fw-bold text-xl mb-1">Agence lorem ipsum</h1>
                <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book.</p>
            </div>
            <div class="col-12 col-lg-6">

            </div>
            <div class="col-12 col-lg-6">
                
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row d-flex justify-content-between mb-12">
            <div class="col-12 col-lg-3 text-center">
                <img src="{{ asset('Monitor iMac 24 mockup Template.jpg') }}" class="rounded-circle img-fluid" alt="..." style="width: 100%; max-width: 360px; height: auto;">
                {{-- <img src="{{ asset($cours->first()->thumbnail) }}" class="rounded-circle" alt="..." style="width:360px;height:350px"> --}}
                {{-- <h2>{{ $cours->first()->title }}</h2> --}}
                <p class="pt-3 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Fuga consequatur inventore reiciendis maxime, dolorem, blanditiis, architecto accusamus illum beatae placeat itaque repudiandae ducimus?</p>
            </div>
            <div class="col-12 col-lg-3 rounded-circle text-center">
                <img src="{{ asset('Linux.jpg') }}" class="rounded-circle img-fluid" alt="Responsive image" style="width: 100%; max-width: 360px; height: auto;">
                
                {{-- <h2>{{ $cours->first()->title }}</h2> --}}

                <p class="pt-3 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Fuga consequatur inventore reiciendis maxime, dolorem, blanditiis, architecto accusamus illum beatae placeat itaque repudiandae ducimus?</p>
            </div>
            <div class="col-12 col-lg-3 rounded-circle text-center ">
                <img src="{{ asset('Macbook Pro 16 INch touchbar.jpg') }}" class="rounded-circle img-fluid" alt="..." style="width: 100%; max-width: 360px; height: auto;">
                
                {{-- <img src="{{ asset($cours->first()->thumbnail) }}" class="rounded-circle" alt="..." style="width:360px;height:350px"> --}}
                {{-- <h2>{{ $cours->first()->title }}</h2> --}}
                <p class="pt-3 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Fuga consequatur inventore reiciendis maxime, dolorem, blanditiis, architecto accusamus illum beatae placeat itaque repudiandae ducimus?
                </p>
            </div>
        </div>
    </div>
</section>
        
<section class="mt-5">
    <div class="container">
        <div class="row d-flex bg-body-tertiary" >
            <div class="col-12 col-lg-6 me-auto p-2 ">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque harum quis non. Qui quo molestiae, quos fugit quod porro tempore velit obcaecati deleniti adipisci, autem deserunt assumenda distinctio, nulla necessitatibus.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque harum quis non. Qui quo molestiae, quos fugit quod porro tempore velit obcaecati deleniti adipisci, autem deserunt assumenda distinctio, nulla necessitatibus.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque harum quis non. Qui quo molestiae, quos fugit quod porro tempore velit obcaecati deleniti adipisci, autem deserunt assumenda distinctio, nulla necessitatibus.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque harum quis non. Qui quo molestiae, quos fugit quod porro tempore velit obcaecati deleniti adipisci, autem deserunt assumenda distinctio, nulla necessitatibus.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque harum quis non. Qui quo molestiae, quos fugit quod porro tempore velit obcaecati deleniti adipisci, autem deserunt assumenda distinctio, nulla necessitatibus.
                </p>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center " style="">
                <img src="{{ asset('Linux.jpg') }}" class="rounded-circle img-fluid" alt="Responsive image" style="width: 100%; max-width: 400px; height:350px;">
                {{-- <img src="{{ asset($cours[5]->thumbnail) }}" class="" alt="..." style="width:360px;height:330px"> --}}
            </div>
        </div>

        <div class="row d-flex mt-5  mb-12">
            <div class="col-12 col-lg-6 me-auto p-2 ">
                <video src="{{ asset('4389357-uhd_3840_2024_30fps.mp4') }}" class="img-fluid" alt="..." controls>
            </div>
            <div class="col-12 col-lg-6 ms-auto px-5">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum obcaecati sequi sunt veritatis ab necessitatibus, quam quae, omnis repellat iste, hic consequatur eos reiciendis tempora commodi nam! Dolor, soluta deleniti.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum obcaecati sequi sunt veritatis ab necessitatibus, quam quae, omnis repellat iste, hic consequatur eos reiciendis tempora commodi nam! Dolor, soluta deleniti.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum obcaecati sequi sunt veritatis ab necessitatibus, quam quae, omnis repellat iste, hic consequatur eos reiciendis tempora commodi nam! Dolor, soluta deleniti.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum obcaecati sequi sunt veritatis ab necessitatibus, quam quae, omnis repellat iste, hic consequatur eos reiciendis tempora commodi nam! Dolor, soluta deleniti.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum obcaecati sequi sunt veritatis ab necessitatibus, quam quae, omnis repellat iste, hic consequatur eos reiciendis tempora commodi nam! Dolor, soluta deleniti.
            </div>
        </div>
    </div>
</section>

<section class="mt-5 mb-5">
    <div class="container">
        <h2>Nos derniers cours :</h2>
        <div class="row">
            @foreach ($cours as $cour)
                <div class="col-12 col-lg-4 d-flex justify-content-evenly">
                    <div class="card mb-3" style="width: 22rem;">
                        <img src="{{ asset($cour->thumbnail) }}" class="w-100 img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ Str::limit($cour->title, 40) }}</h5>
                            <p class="card-text text-center">{{ Str::words($cour->description, 15) }}</p>
                            <div class="row  pt-3">
                                <div class="col-6 col-lg-6 liking">
                                    <i class="fa-heart {{ $cour->isLikedByUser() ? 'fas' : 'far' }}"></i>
                                    <span class="like-count">{{$cour->likes_count}} Likes</span>
                                    <button class="like-btn btn btn-outline-dark" data-cour-id="{{ $cour->id }}">
                                        @if($cour->likes()->where('user_id', Auth::id())->exists())
                                            Unlike 
                                        @else
                                            Like 
                                        @endif 
                                    </button>
                                </div>
                                <div class="col-6 col-lg-6 d-flex justify-content-center">
                                    <p class="card-text">
                                        <small class="text-muted">
                                            {{ number_format($cour->price, thousands_separator: ' ') }} £ 
                                            
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="row d-flex pt-3">
                                <div class="col-6 col-lg-6 d-flex">
                                    <p class="card-text"><small class="text-muted">{{ $cour->updated_at->diffForHumans() }}</small></p>
                                </div>
                                <div class="col-6 col-lg-6 ">
                                    <a href="{{ route('stripe.checkout', ['cour' => $cour]) }}" class="btn btn-outline-primary mx-4">Panier</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            @endforeach
        </div>
    </div>
</section>

@endsection