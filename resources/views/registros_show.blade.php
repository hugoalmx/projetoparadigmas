@extends('master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Detalhes do Lead: {{ $lead->name }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Email:</strong> {{ $lead->email }}</p>
                    <p><strong>Empresa:</strong> {{ $lead->empresa }}</p>
                    <p><strong>CNPJ:</strong> {{ $lead->cnpj }}</p>
                    <p><strong>Categoria:</strong> {{ $lead->categoria }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-3">Registros do Lead</h2>

            @if ($registros->isEmpty())
                <div class="alert alert-info">O usuário não possui registros.</div>
            @else
                @foreach ($registros as $registro)
                    <div class="card mb-3">
                        <div class="card-body">
                            <p><strong>Tipo de Interação:</strong> {{ $registro->tipo_interacao }}</p>
                            <p><strong>Data de Interação:</strong> {{ $registro->data_interacao }}</p>
                            <p><strong>Descrição:</strong> {{ $registro->descricao_interacao }}</p>

                            <div class="btn-group" role="group">
                                <a href="{{ route('registros.edit', ['leadId' => $lead->id, 'registroId' => $registro->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('registros.destroy', ['leadId' => $lead->id, 'registroId' => $registro->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="d-flex justify-content-center gap-2 mt-3">
                <a href="{{ route('registros.create', ['lead' => $lead->id]) }}" class="btn btn-primary">Adicionar Registro</a>
                <a href="{{ route('leads.index') }}" class="btn btn-secondary">Ver Leads</a>
                <a href="{{ route('home.index') }}" class="btn btn-secondary">Página Principal</a>
            </div>

        </div>
    </div>
</div>

@endsection
