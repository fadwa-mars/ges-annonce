@extends('layouts.layout')
@section('title', 'Détails annonce')
@section('content')

<div class="card">
    <div class="card-header">
        <h3>Détails annonce</h3>
    </div>
    <div class="card-body">
        <p>Id: {{ $annonce->id }}</p>
        <p>Titre: {{ $annonce->titre }}</p>
        <p>Description: {{ $annonce->description }}</p>
        <p>Type: {{ $annonce->type }}</p>
        <p>Ville: {{ $annonce->ville }}</p>
        <p>Superficie: {{ $annonce->superficie }} m²</p>
        <p>Etat: {{ $annonce->neuf ? 'Neuf' : 'Ancien' }}</p>
        <p>Prix: {{ $annonce->prix }} DH</p>
        @if($annonce->photo)
            <p>Photo:</p>
            <img src="{{ asset('storage/' . $annonce->photo) }}"
                 alt="photo" width="200" class="rounded">
        @endif
        <br><br>
        <a href="{{ route('annonce.index') }}" class="btn btn-secondary">Retour</a>
    </div>
</div>

@endsection