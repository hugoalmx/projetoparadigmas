@extends('master')

@section('content')

<h2>Home</h2>

<!-- Botão para ir para a página de usuários -->
<a href="{{ route('users.index') }}" class="btn btn-primary">Ver Usuários</a>

@endsection

