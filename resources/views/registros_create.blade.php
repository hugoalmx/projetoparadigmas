@extends('master')

@section('content')

<h2>Adicionar Registro para {{ $lead->name }}</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('registros.store')}}" method="post">
    @csrf
    <input type="text" name="tipo_interacao" placeholder="Meio Utilizado">
    <input type="datetime-local" name="data_interacao" placeholder="Data do contato">
    <input type="text" name="descricao_interacao" placeholder="Descrição">
    
    <input type="hidden" name="lead_id" value="{{ $leadId }}">

    <button type="submit">Criar</button>
</form>

<!-- Botão para ir para a página de registros -->
<a href="{{ route('registros.index', ['leadId' => $lead->id]) }}" class="btn btn-primary">Ver Registros</a>

<!-- Botão para ir para a página de usuários -->
<a href="{{ route('leads.index') }}" class="btn btn-primary">Ver Usuários</a>
<!-- Botão para ir para a página principal -->
<a href="{{ route('home') }}" class="btn btn-primary">Página Principal</a>
@endsection
