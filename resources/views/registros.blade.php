@extends('master')

@section('content')

<h2>Lista de Registros</h2>

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>Nome do Lead</th>
            <th>ID do lead</th>
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
                <td>{{ $registro->user_id }}</td>
                <td>{{ $registro->tipo_interacao }}</td>
                <td>{{ $registro->data_interacao }}</td>
                <td>{{ $registro->descricao_interacao }}</td>
                <td>
                    <a href="{{ route('registros.show', $registro->id) }}">Ver</a>
                    <a href="{{ route('registros.edit', $registro->id) }}">Editar</a>
                    <form action="{{ route('registros.destroy', $registro->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Botão para ir para a página de usuários -->
<a href="{{ route('leads.index') }}" class="btn btn-primary">Ver Usuários</a>
<!-- Botão para ir para a página principal -->
<a href="{{ route('home') }}" class="btn btn-primary">Página Principal</a>

@endsection
