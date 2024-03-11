@extends('master')

@section('content')

<h2>Editar</h2>

@if (session()->has('message'))
    {{ session() -> get('message')}}

@endif
<form action="{{route('users.update', ['user' => $user->id]) }}" method="post">
@csrf
<input type="hidden" name="_method" value="PUT">
    <input type="text" name="name" value="{{ $user -> name}}">
    <input type="text" name="email" value="{{ $user -> email}}">
    <input type="text" name="empresa" value="{{ $user -> empresa}}">
    <input type="text" name="cnpj" value="{{ $user -> cnpj}}">
    <input type="text" name="tags" value="{{ $user -> tags}}">
    <button type="submit">Editar</button>
</form>
</form>

@if ($user->cliente)
    <p>Este usuário é um cliente.</p>
    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="cliente" value="0">
        <button type="submit">Tornar Lead</button>
    </form>
@else
    <p>Este usuário não é um cliente.</p>
    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="cliente" value="1">
        <button type="submit">Tornar Cliente</button>
    </form>
@endif
</form>

<!-- Botão para ir para a página de usuários -->
<a href="{{ route('users.index') }}" class="btn btn-primary">Ver Usuários</a>


@endsection
