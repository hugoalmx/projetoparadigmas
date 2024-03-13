@extends('master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Adicionar Registro para {{ $lead->name }}</h2>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <form action="{{ route('registros.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="tipo_interacao">Meio Utilizado:</label>
                            <input type="text" name="tipo_interacao" id="tipo_interacao" class="form-control" placeholder="Meio Utilizado">
                            @error('tipo_interacao')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
 
                        <div class="form-group">
                            <label for="data_interacao">Data do Contato:</label>
                            <input type="datetime-local" name="data_interacao" id="data_interacao" class="form-control" placeholder="Data do contato">
                            @error('data_interacao')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descricao_interacao">Descrição:</label>
                            <input type="text" name="descricao_interacao" id="descricao_interacao" class="form-control" placeholder="Descrição">
                        </div>
    
                        <input type="hidden" name="lead_id" value="{{ $leadId }}">

                        <button type="submit" class="btn btn-primary">Criar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('registros.index', ['leadId' => $lead->id]) }}" class="btn btn-primary">Ver Registros</a>
            <a href="{{ route('leads.index') }}" class="btn btn-primary">Ver Usuários</a>
            <a href="{{ route('home.index') }}" class="btn btn-primary">Página Principal</a>
        </div>
    </div>
</div>

@endsection
