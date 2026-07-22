@extends('base')
<style>
    .hero-section{
    position:relative;
    height:700px;

    background:url("{{ asset('elearning-banner-design-man-working-260nw-2431834665.webp') }}") center center/cover no-repeat;
}

.hero-section .overlay{
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.60);
}

.hero-section .container{
    position:relative;
    z-index:2;
}

.hero-cards{
    margin-top:-100px;
    position:relative;
    z-index:20;
}

.hero-cards .card{
    transition:.3s;
}

.hero-cards .card:hover{
    transform:translateY(-10px);
}
</style>
@section('content')
<section class="hero-section">
    <div class="overlay"></div>

    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-7 text-white" z-index=-9999>
                <span class="badge bg-warning px-3 py-2 mb-3">
                    Plus de 200 formations
                </span>

                <h1 class="display-3 fw-bold">
                    Apprenez les compétences qui feront votre avenir
                </h1>

                <p class="lead mt-4 mb-4">
                    Développez vos compétences grâce à des cours vidéo,
                    des exercices pratiques et des certificats.
                </p>

                <a href="{{ route("cour.index") }}" class="btn btn-warning btn-lg px-5">
                    Commencer maintenant
                </a>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5">
    <div class="row hero-cards g-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body text-center p-5">
                    <i class="bi bi-play-circle-fill display-4 text-warning"></i>

                    <h4 class="mt-3">
                        200+ Cours
                    </h4>

                    <p class="text-muted">
                        Formations professionnelles en informatique,
                        bureautique, développement web et bien plus.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body text-center p-5">
                    <i class="bi bi-award-fill display-4 text-success"></i>

                    <h4 class="mt-3">
                        Certificats
                    </h4>

                    <p class="text-muted">
                        Recevez un certificat après validation
                        de chaque formation.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body text-center p-5">
                    <i class="bi bi-people-fill display-4 text-primary"></i>

                    <h4 class="mt-3">
                        Communauté
                    </h4>

                    <p class="text-muted">
                        Échangez avec des milliers d'étudiants
                        et de formateurs.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

<section class="mt-5">
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