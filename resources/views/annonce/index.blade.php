@extends('layouts.layout')
@section('title', 'Annonces')
@section('content')

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

<div class="table-responsive">
    <h4 class="text-center mb-3">Liste des annonces</h4>
    <a href="{{ route('annonce.create') }}" class="btn btn-primary mb-3">Nouvelle annonce</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Type</th>
                <th>Ville</th>
                <th>Superficie(m²)</th>
                <th>Etat</th>
                <th>Prix(dhs)</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($annonces as $annonce)
            <tr>
                <td>{{ $annonce->titre }}</td>
                <td>{{ $annonce->description }}</td>
                <td>{{ $annonce->type }}</td>
                <td>{{ $annonce->ville }}</td>
                <td>{{ $annonce->superficie }}</td>
                <td>{{ $annonce->neuf ? 'Neuf' : 'Ancien' }}</td>
                <td>{{ $annonce->prix }}</td>
                <td>
                    @if($annonce->photo)
                        <img src="{{ asset('storage/' . $annonce->photo) }}"
                             alt="photo" width="60" class="rounded">
                    @else
                        <span class="text-muted">Aucune</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('annonce.show', $annonce->id) }}"
                        class="btn btn-info"><i class="bi bi-list"></i></a>

                    <a href="{{ route('annonce.edit', $annonce->id) }}"
                        class="btn btn-warning"><i class="bi bi-pencil"></i></a>

                    <form onsubmit="return confirm('Voulez-vous vraiment supprimer l\'annonce : {{ $annonce->titre }} ?')"
                        class="d-inline"
                        action="{{ route('annonce.destroy', $annonce->id) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection