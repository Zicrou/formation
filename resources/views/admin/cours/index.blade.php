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
                <th>Cover</th>
                <th>Titre</th>
                <th>Prix</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cours as $cour)
            <tr>
                    <td class="m-0"><img src="{{ asset($cour->thumbnail) }}" alt="" style="width:2.9rem;height: auto"></td>
                    {{-- <td><video controls src="{{ asset($cour->video) }}" style="width:200px;height:175px"></video></td> --}}
                    <td>{{ $cour->title }}</td>
                    <td>{{ number_format($cour->price, thousands_separator: ' ') }}</td>
                    <td class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.cours.edit', $cour)}}" class="btn btn-primary">Editer</a>
                        <form action="{{ route('admin.cours.destroy', $cour) }}" method="post">
                            @csrf
                            @method("delete")
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>

    {{ $cours->links() }}
@endsection