<div @class(['card']) style="m-0 p-0 min-width:;" >
    <div class="mb-3" style="">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset($cour->thumbnail) }}" class="img-fluid h-auto rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('cour.show', ['slug' => $cour->getSlug(), 'cour' => $cour]) }}">
                            {{ Str::limit($cour->title, 40) }}
                        </a>
                    </h5>
                    <p class="card-text">
                        {{ Str::words($cour->description, 15) }}
                    </p>
                    <div class="liking">
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
                    
                    <p class="card-text d-flex justify-content-end">
                        <small class="text-muted">{{ number_format($cour->price, thousands_separator: ' ') }} £ <a href="{{ route('stripe.checkout', ['cour' => $cour]) }}" class="btn btn-outline-primary mx-4"> Acheter</a></small>
                    </p>
                    
                    <p class="card-text"><small class="text-muted">{{ $cour->updated_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- 
<div class="card mb-3">
    <div class="">
        <img src="{{ asset($cour->thumbnail) }}" class="card-img-top " alt="...">
    </div>
    <div class="card-body">
        <h5 class="card-title">
        <a href="{{ route('cour.show', ['slug' => $cour->getSlug(), 'cour' => $cour]) }}">
            {{ Str::limit($cour->title, 40) }}
        </a>
        </h5>
        <p class="card-text">{{ Str::words($cour->description, 15) }}</p>
        <p class="card-text"><small class="text-muted">{{ number_format($cour->price, thousands_separator: ' ') }} £</small></p>
    </div>
</div>

<div class="card-body">
    <h5 class="card-title">
        <a
            href="{{ route('cour.show', ['slug' => $cour->getSlug(), 'cour' => $cour]) }}">{{ Str::limit($cour->title, 40) }}</a>
    </h5>
    <img src="{{ asset($cour->thumbnail) }}" alt="">
    <hr>   
    <p class="card-text">{{ Str::words($cour->description, 15) }}</p>
    <div class="text-primary fw-bold" style="font-size: 1.4rem;">{{ number_format($cour->price, thousands_separator: ' ') }} £ </div>
</div> --}}

<script>
    $(document).on('click', '.like-btn', function() {
        const courId = $(this).data('cour-id');
        const button = $(this);
        //let i_tag = button.find('i');
        const parentDiv = button.closest('div');
        $.ajax({
            url: '{{ route("likes.cours", ":courId") }}'.replace(':courId', courId),
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                
                // Change the like status text
                if (response.status === 'liked') {
                    i_tag = parentDiv.find("i").removeClass("far").addClass("fas");
                    status = parentDiv.find(".like-count").text(response.likesCount + " Likes"); 
                    button.find('.like-count').text(response.likesCount + " Likes");
                    button.text( "Unlike")
                } else {
                    i_tag = parentDiv.find("i").removeClass("fas").addClass("far");
                    status = parentDiv.find(".like-count").text(response.likesCount + " Likes"); 
                    button.find('.like-count').text(response.likesCount + " Likes");
                    button.text("Like");
                }
            },
            error: function() {
                window.location.href = '{{ route("login") }}';
            }
        });
    });
</script>