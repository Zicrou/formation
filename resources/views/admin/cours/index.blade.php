@extends('admin.admin')

@section('title', 'Tous les biens')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.cours.create') }}" class="btn btn-primary">Ajouter un cours</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Titre</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cours as $cour)
                <tr>
                    <td><img src="{{ asset($cour->thumbnail) }}" alt="" style="width:200px;height:175px"></td>
                    <td><video controls src="{{ asset($cour->video) }}" style="width:200px;height:175px"></video></td>
                    <td>{{ $cour->title }}</td>
                    <td>{{ number_format($cour->price, thousands_separator: ' ') }}</td>
                    <td>{{ $cour->Thumbnail }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cours->links() }}
@endsection