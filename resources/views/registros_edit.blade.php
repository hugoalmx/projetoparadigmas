@extends('master')

@section('content')

<h2>Editar Registro</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('registros.update', ['registro' => $registro->id]) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="tipo_interacao">Tipo de Interação</label>
        <input type="text" name="tipo_interacao" class="form-control" id="tipo_interacao" value="{{ $registro->tipo_interacao }}">
    </div>
    <div class="form-group">
        <label for="descricao_interacao">Descrição da Interação</label>
        <textarea name="descricao_interacao" class="form-control" id="descricao_interacao">{{ $registro->descricao_interacao }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>

<!-- Botão para ir para a página de registros -->
<a href="{{ route('registros.index') }}" class="btn btn-primary">Ver Registros</a>

@endsection