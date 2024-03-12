@extends('master')

@section('content')

<h2>Criar Lead</h2>

@if (session()->has('message'))
    {{ session() -> get('message')}}

@endif



<form action="{{route('leads.store')}}" method="post">
@csrf
    <input type="text" name="name" placeholder="Nome">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="empresa" placeholder="Empresa">
    <input type="text" name="cnpj" placeholder="CNPJ">
    <input type="text" name="tags" placeholder="Categoria">
    <input type="text" name="password" placeholder="Senha">
    <button type="submit">Criar</button>
</form>

<!-- Botão para ir para a página de usuários -->
<a href="{{ route('leads.index') }}" class="btn btn-primary">Ver Usuários</a>
<!-- Botão para ir para a página principal -->
<a href="{{ route('home') }}" class="btn btn-primary">Página Principal</a>
@endsection
