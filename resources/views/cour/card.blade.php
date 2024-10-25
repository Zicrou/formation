<div @class(['card', 'sold' => $cour->sold == 1]) style="m-0 p-0 min-width: 124px;">
    <div class="card-body">
        <h5 class="card-title">
            <a
                href="{{ route('cour.show', ['slug' => $cour->getSlug(), 'cour' => $cour]) }}">{{ Str::limit($cour->title, 40) }}</a>
        </h5>
        <hr>   
        <p class="card-text">{{ Str::words($cour->description, 15) }}</p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem;">{{ number_format($cour->price, thousands_separator: ' ') }} £ </div>
    </div>
</div>
