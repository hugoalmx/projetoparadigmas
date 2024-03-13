@extends('master')

@section('content')

<div class="container" style="background-color: #343a40; color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">

    <div class="mb-3">
        <a href="{{ route('home.index') }}" class="btn btn-primary">Página Principal</a>
        <a href="{{ route('leads.create') }}" class="btn btn-primary">Adicionar Lead</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped" style="color: #ffffff;">
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
                            <a href="{{ route('leads.edit', ['lead' => $lead->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="{{ route('leads.show', ['lead' => $lead->id]) }}" class="btn btn-sm btn-danger">Excluir</a>
                            <a href="{{ route('registros.create', ['lead' => $lead->id]) }}" class="btn btn-sm btn-success">Adicionar Registro</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <form action="{{ route('leads.index') }}" method="get">
        <div class="row">
            <div class="col-md-6">
                <select name="cliente" class="form-control">
                    <option value="">Filtrar por Cliente</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" name="categoria" class="form-control" placeholder="Pesquisar por Categoria">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Pesquisar e Filtrar</button>
            </div>
            <div class="col-md-6">
                <a href="{{ route('leads.index') }}" class="btn btn-danger">Remover Filtros</a>
                <button type="button" onclick="window.location.reload();" class="btn btn-secondary">Atualizar</button>
            </div>
        </div>
    </form>

</div>

@endsection
