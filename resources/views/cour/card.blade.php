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
                    <a href="{{ route('cart.store', ['cour' => $cour]) }}" class="btn btn-outline-primary mx-4">Panier</a>
                    {{-- <a href="{{ route('stripe.checkout', ['cour' => $cour]) }}" class="btn btn-outline-primary mx-4">Panier</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script>
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
</script> --}}