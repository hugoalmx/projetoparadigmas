@extends('master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Detalhes do Usuário: {{ $lead->name }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Email:</strong> {{ $lead->email }}</p>
                    <p><strong>Empresa:</strong> {{ $lead->empresa }}</p>
                    <p><strong>CNPJ:</strong> {{ $lead->cnpj }}</p>
                    <p><strong>Categoria:</strong> {{ $lead->tags }}</p>
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
                <p>O usuário não possui registros.</p>
            @else
                @foreach ($registros->chunk(1) as $chunk)
                    <ul class="list-group mb-3">
                        @foreach ($chunk as $registro)
                            <li class="list-group-item">
                                <p><strong>Tipo de Interação:</strong> {{ $registro->tipo_interacao }}</p>
                                <p><strong>Data de Interação:</strong> {{ $registro->data_interacao }}</p>
                                <p><strong>Descrição:</strong> {{ $registro->descricao_interacao }}</p>

                                <div class="btn-group" role="group">
                                    
                                        <a href="{{ route('registros.edit', ['leadId' => $lead->id, 'registroId' => $registro->id]) }}">Editar</a>
                                    
                                    <form action="{{ route('registros.destroy', ['leadId' => $lead->id, 'registroId' => $registro->id]) }}" method="post">

                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            @endif

            <a href="{{ route('registros.create', ['lead' => $lead->id]) }}" class="btn btn-primary mt-3">Voltar para Adicionar Registro</a>
        </div>
    </div>
</div>

@endsection
