@extends('master')

@section('content')

<div class="container" style="background-color: #343a40; color: #ffffff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    <h1 class="text-center mb-4">Editar Lead</h1>

    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

    <form action="{{ route('leads.update', ['lead' => $lead->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $lead->name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $lead->email }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="empresa" class="form-label">Empresa:</label>
            <input type="text" id="empresa" name="empresa" class="form-control" value="{{ $lead->empresa }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="cnpj" class="form-label">CNPJ:</label>
            <input type="text" id="cnpj" name="cnpj" class="form-control" value="{{ $lead->cnpj }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="categoria" class="form-label">Categoria:</label>
            <input type="text" id="categoria" name="categoria" class="form-control" value="{{ $lead->categoria }}" required>
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-3">Salvar</button>
    </form>

    @if ($lead->cliente)
        <p>Este usuário já é um cliente.</p>
        <form action="{{ route('leads.update', ['lead' => $lead->id]) }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="remover_cliente" value="1">
            <button type="submit" class="btn btn-warning w-100 mb-3">Reverter para Lead</button>
        </form>
    @else
        <p>Este usuário não é um cliente.</p>
        <form action="{{ route('leads.update', ['lead' => $lead->id]) }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="cliente" value="1">
            <button type="submit" class="btn btn-success w-100 mb-3">Tornar Cliente</button>
        </form>
    @endif

    <div class="d-flex justify-content-center mt-3">
        <a href="{{ route('leads.index') }}" class="btn btn-secondary">Ver Leads</a>
    </div>
</div>

@endsection
