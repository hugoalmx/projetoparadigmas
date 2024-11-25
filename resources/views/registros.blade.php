@extends('master')

@section('content')

<h2 class="text-center mb-4">Lista de Registros</h2>

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<div class="table-responsive">
    <table class="table table-dark table-striped table-bordered">
        <thead>
            <tr>
                <th>Nome do Lead</th>
                <th>ID do Lead</th>
                <th>Tipo de Interação</th>
                <th>Data de Interação</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registros as $registro)
                <tr>
                    <td>{{ $registro->lead->name }}</td>
                    <td>{{ $registro->lead->id }}</td>
                    <td>{{ $registro->tipo_interacao }}</td>
                    <td>{{ $registro->data_interacao }}</td>
                    <td>{{ $registro->descricao_interacao }}</td>
                    <td>
                        <a href="{{ route('registros.edit', ['leadId' => $registro->lead->id, 'registroId' => $registro->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('registros.destroy', $registro->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="text-center mt-4">
    <a href="{{ route('leads.index') }}" class="btn btn-primary">Ver Usuários</a>
    <a href="{{ route('home.index') }}" class="btn btn-secondary">Página Principal</a>
</div>

@endsection
