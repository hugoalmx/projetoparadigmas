@extends('master')

@section('content')

<style>
    .card {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .card-header {
        background-color: #343a40;
        color: white;
        border-bottom: 1px solid #dee2e6;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .form-group {
        margin-bottom: 20px;
    }
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Editar Lead</h2>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form action="{{ route('leads.update', ['lead' => $lead->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $lead->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $lead->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="empresa">Empresa:</label>
                            <input type="text" id="empresa" name="empresa" class="form-control" value="{{ $lead->empresa }}" required>
                        </div>
                        <div class="form-group">
                            <label for="cnpj">CNPJ:</label>
                            <input type="text" id="cnpj" name="cnpj" class="form-control" value="{{ $lead->cnpj }}" required>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <input type="text" id="categoria" name="categoria" class="form-control" value="{{ $lead->categoria }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Editar</button>
                    </form>
                    @if ($lead->cliente)
                        <p>Este usuário é um cliente.</p>
                        <form action="{{ route('leads.update', ['lead' => $lead->id]) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="cliente" value="0">
                            <button type="submit" class="btn btn-warning mr-2">Tornar Lead</button>
                        </form>
                    @else
                        <p>Este usuário não é um cliente.</p>
                        <form action="{{ route('leads.update', ['lead' => $lead->id]) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="cliente" value="1">
                            <button type="submit" class="btn btn-success mr-2">Tornar Cliente</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Botão para ir para a página de usuários -->
<a href="{{ route('leads.index') }}" class="btn btn-primary mt-3">Ver Leads</a>

@endsection
