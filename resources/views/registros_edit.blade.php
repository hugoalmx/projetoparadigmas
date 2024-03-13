@extends('master')

@section('content')

<div class="container-fluid" style="background-color: #343a40; color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Registro') }}</div>

                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($registro)
                        <form action="{{ route('registros.update', ['leadId' => $registro->lead_id, 'registroId' => $registro->id]) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="tipo_interacao">Tipo de Interação:</label>
                                <input type="text" id="tipo_interacao" name="tipo_interacao" class="form-control" placeholder="Tipo de Interação" value="{{ $registro->tipo_interacao }}" required>
                            </div>
                            <div class="form-group">
                                <label for="data_interacao">Data de Interação:</label>
                                <input type="datetime-local" id="data_interacao" name="data_interacao" class="form-control" placeholder="Data de Interação" value="{{ date('Y-m-d\TH:i', strtotime($registro->data_interacao)) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="descricao_interacao">Descrição:</label>
                                <input type="text" id="descricao_interacao" name="descricao_interacao" class="form-control" placeholder="Descrição" value="{{ $registro->descricao_interacao }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                        <a href="{{ route('leads.index') }}" class="btn btn-secondary">Ver Usuários</a>
                        <button onclick="window.history.back();" class="btn btn-secondary">Voltar para o registro</button>

                    @else
                        <p>Registro não encontrado.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row justify-content-center mt-3">
    <div class="col-lg-4">
        <p>Já tem conta? <a href="{{ route('login') }}">Faça Login</a></p>
    </div>
</div>

@endsection
