@extends('master')

@section('content')

<h2>Editar</h2>

@if (session()->has('message'))
    {{ session() -> get('message')}}

@endif
<form action="{{route('leads.update', ['lead' => $lead->id]) }}" method="post">
@csrf
<input type="hidden" name="_method" value="PUT">
    <input type="text" name="name" value="{{ $lead -> name}}">
    <input type="text" name="email" value="{{ $lead -> email}}">
    <input type="text" name="empresa" value="{{ $lead -> empresa}}">
    <input type="text" name="cnpj" value="{{ $lead -> cnpj}}">
    <input type="text" name="tags" value="{{ $lead -> tags}}">
    <button type="submit">Editar</button>
</form>
</form>

@if ($lead->cliente)
    <p>Este usuário é um cliente.</p>
    <form action="{{ route('leads.update', ['lead' => $lead->id]) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="cliente" value="0">
        <button type="submit">Tornar Lead</button>
    </form>
@else
    <p>Este usuário não é um cliente.</p>
    <form action="{{ route('leads.update', ['lead' => $lead->id]) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="cliente" value="1">
        <button type="submit">Tornar Cliente</button>
    </form>
@endif
</form>

<!-- Botão para ir para a página de usuários -->
<a href="{{ route('leads.index') }}" class="btn btn-primary">Ver Leads</a>


@endsection
