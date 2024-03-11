@extends('layouts.app')

@section('content')

<h2>Detalhes do Registro</h2>

<p>ID: {{ $registro->id }}</p>


<a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>

@endsection
