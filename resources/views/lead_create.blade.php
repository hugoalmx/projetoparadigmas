@extends('master')

@section('content')

<div class="container-fluid" style="background-color: #343a40; color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criar Lead') }}</div>

                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <h1 class="mb-4">Bem-vindo, {{ Auth::user()->name }} ! Adicione um lead:</h1>

                    <form action="{{ route('leads.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Digite o nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Digite o email" required>
                        </div>
                        <div class="form-group">
                            <label for="empresa">Empresa:</label>
                            <input type="text" id="empresa" name="empresa" class="form-control" placeholder="Digite o nome da empresa" required>
                        </div>
                        <div class="form-group">
                            <label for="cnpj">CNPJ:</label>
                            <input type="text" id="cnpj" name="cnpj" class="form-control" placeholder="Digite o CNPJ" required>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Digite a categoria" required>
                        </div>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <button type="submit" class="btn btn-primary">Criar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <a href="{{ route('leads.index') }}" class="btn btn-secondary">Ver Leads</a>
            <a href="{{ route('home.index') }}" class="btn btn-secondary">Página Principal</a>
        </div>
    </div>

</div>

@endsection
