@extends('layouts.layout')
@section('title', 'Dashboard')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Gestion Immobilière</h3>
    <a href="{{ route('annonce.create') }}" class="btn btn-primary">
        <i class="bi bi-plus"></i> Nouvelle annonce
    </a>
</div>

<div class="card mb-3">
    <div class="card-body d-flex align-items-center gap-3">
        <i class="bi bi-house fs-3 text-primary"></i>
        <div>
            <small class="text-muted">Total Annonces</small>
            <h4 class="mb-0">{{ $stats['total'] }}</h4>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body d-flex align-items-center gap-3">
        <i class="bi bi-wallet fs-3 text-success"></i>
        <div>
            <small class="text-muted">Valeur Totale (DHS)</small>
            <h4 class="mb-0">{{ $stats['prix_total'] }}</h4>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body d-flex align-items-center gap-3">
        <i class="bi bi-graph-up fs-3 text-warning"></i>
        <div>
            <small class="text-muted">Prix Moyen</small>
            <h4 class="mb-0">{{ $stats['prix_moyen'] }}</h4>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body d-flex align-items-center gap-3">
        <i class="bi bi-grid fs-3 text-danger"></i>
        <div>
            <small class="text-muted">Superficie (m²)</small>
            <h4 class="mb-0">{{ $stats['superficie_total'] }}</h4>
        </div>
    </div>
</div>

@endsection