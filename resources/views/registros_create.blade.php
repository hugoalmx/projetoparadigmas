@extends('master')

@section('content')

<h2>Adicionar Registro</h2>


@if (session()->has('message'))
    {{ session() -> get('message')}}

@endif


<form action="{{ route('registros.store')}}" method="post">


@csrf
    <input type="text" name="tipo_interacao" placeholder="Meio Utilizado">
    <input type="datetime-local" name="data_interacao" placeholder="Data do contato">
    <input type="text" name="descricao_interacao" placeholder="Descrição">
    <input type="text" name="name" placeholder="nome do lead (obrigatorio)">
    <button type="submit">Criar</button>
</form>


<!-- Botão para ir para a página de registros -->
<a href="{{ route('registros.index') }}" class="btn btn-primary">Vizualisar registros</a>
<!-- Botão para ir para a página de usuários -->
<a href="{{ route('users.index') }}" class="btn btn-primary">Ver Usuários</a>
<!-- Botão para ir para a página principal -->
<a href="{{ route('home') }}" class="btn btn-primary">Página Principal</a>
@endsection
