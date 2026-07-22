<div class="row">
    @include('shared.input', ['class' => 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $cour->title])
    <div class="col row">
        @include('shared.input', ['class' => 'col', 'name' => 'price', 'value' => $cour->price])
    </div>
</div>
@include('shared.input', ['type' => 'textarea', 'class' => 'col', 'name' => 'description', 'value' => $cour->description])
<div class="row">
    <div class="col-md-5 mb-3">
        <label class="mb-1">Thumbnail</label>
        <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror">
        @error('thumbnail')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-5 mb-3">
        <label class="mb-1">Video</label>
        <input type="file" name="video" class="form-control @error('video') is-invalid @enderror">
        @error('video')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mx-2">
        @include('shared.select', ['name' => 'tags', 'label' => 'Tags', 'value' => $cour['tags']->pluck('id', 'name'), 'multiple' => true])
        @include('shared.checkbox', ['name' => 'disponible', 'label' => 'disponible', 'value' => $cour->disponible, 'tags' => $tags])
    </div>
</div>
<div>
    <button class="btn btn-primary" type="submit">
        @if ($cour->exists)
            Modifier
        @else
            Créer
        @endif
    </button>
</div>