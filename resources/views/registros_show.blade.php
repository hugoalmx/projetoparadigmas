@extends('master')

@section('content')

<h2>Detalhes do Usuário: {{ $lead->name }}</h2>

<p>Email: {{ $lead->email }}</p>
<p>Empresa: {{ $lead->empresa }}</p>
<p>CNPJ: {{ $lead->cnpj }}</p>
<p>Categoria: {{ $lead->tags }}</p>

<h2>Registros do Lead</h2>

@if ($registros->isEmpty())
    <p>O usuário não possui registros.</p>
@else
    <ul>
        @foreach ($registros as $registro)
            <li>
                <p>Tipo de Interação: {{ $registro->tipo_interacao }}</p>
                <p>Data de Interação: {{ $registro->data_interacao }}</p>
                <p>Descrição: {{ $registro->descricao_interacao }}</p>
            </li>
        @endforeach
    </ul>
@endif

<a href="{{ route('registros.create', ['lead' => $lead->id]) }}">Voltar para Adicionar Registro</a>

@endsection

