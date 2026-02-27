@extends('layouts.layout')
@section('title', 'Modifier une annonce')
@section('content')

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

<h3>Modifier une annonce</h3>
<form action="{{ route('annonce.update', $annonce) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('annonce.form')
    <button class="btn btn-primary w-100" type="submit">Modifier</button>
</form>

@endsection