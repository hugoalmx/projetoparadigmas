@extends('master')

@section('content')

<style>
    body {
        background-color: #343a40;
        color: #ffffff;
        font-family: Arial, sans-serif;
    }

    .container {
        background-color: #212529;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin-top: 20px;
    }

    .btn {
        margin: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .table {
        margin-top: 20px;
    }

    .table th, .table td {
        vertical-align: middle;
        color: #ffffff;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #6c757d;
        background-color: #495057;
        color: #ffffff;
    }

    .form-control::placeholder {
        color: #ced4da;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .btn-group {
        display: flex;
        justify-content: flex-end;
    }

    .form-row {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

    .form-row .form-group {
        flex: 1;
    }
</style>

<div class="container">
    <div class="btn-group">
        <a href="{{ route('home.index') }}" class="btn btn-primary">Página Principal</a>
        <a href="{{ route('leads.create') }}" class="btn btn-primary">Adicionar Lead</a>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Empresa</th>
                    <th>CNPJ</th>
                    <th>Categoria</th>
                    <th>É Cliente?</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $lead)
                    <tr>
                        <td>{{ $lead->name }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->empresa }}</td>
                        <td>{{ $lead->cnpj }}</td>
                        <td>{{ $lead->categoria }}</td>
                        <td>{{ $lead->cliente ? 'Sim' : 'Não' }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('leads.edit', ['lead' => $lead->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                                <a href="{{ route('leads.show', ['lead' => $lead->id]) }}" class="btn btn-sm btn-danger">Excluir</a>
                                <a href="{{ route('registros.create', ['lead' => $lead->id]) }}" class="btn btn-sm btn-success">Adicionar Registro</a>
                                <a href="{{ route('registros.index', ['leadId' => $lead->id]) }}" class="btn btn-sm btn-primary">Ver Registros</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <form action="{{ route('leads.index') }}" method="get">
        <div class="form-row">
            <div class="form-group">
                <select name="cliente" class="form-control">
                    <option value="">Filtrar por Cliente</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="categoria" class="form-control" placeholder="Pesquisar por Categoria">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Pesquisar e Filtrar</button>
                <a href="{{ route('leads.index') }}" class="btn btn-danger">Remover Filtros</a>
                <button type="button" onclick="window.location.reload();" class="btn btn-secondary">Atualizar</button>
            </div>
        </div>
    </form>
</div>

@endsection
