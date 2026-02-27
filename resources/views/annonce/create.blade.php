@extends('layouts.layout')
@section('title', 'Ajouter une annonce')
@section('content')

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

<h3>Ajouter une annonce</h3>
<form action="{{ route('annonce.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('annonce.form')
    <button class="btn btn-primary w-100" type="submit">Ajouter</button>
</form>

@endsection