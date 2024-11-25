@extends('master')

@section('content')

<div class="container" style="background-color: #343a40; color: #ffffff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    <h1 class="text-center mb-4">Criar Lead</h1>

    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="mb-4 text-center">Bem-vindo, {{ Auth::user()->name }}! Adicione um novo lead:</h2>

    <form action="{{ route('leads.store') }}" method="post" class="mb-4">
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Digite o nome" required>
        </div>

        <div class="form-group mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Digite o e-mail" required>
        </div>

        <div class="form-group mb-3">
            <label for="empresa" class="form-label">Empresa:</label>
            <input type="text" id="empresa" name="empresa" class="form-control" placeholder="Digite o nome da empresa" required>
        </div>

        <div class="form-group mb-3">
            <label for="cnpj" class="form-label">CNPJ:</label>
            <input type="text" id="cnpj" name="cnpj" class="form-control" placeholder="Digite o CNPJ" required>
        </div>

        <div class="form-group mb-3">
            <label for="categoria" class="form-label">Categoria:</label>
            <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Digite a categoria" required>
        </div>

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <button type="submit" class="btn btn-primary w-100">Criar</button>
    </form>

    <div class="d-flex justify-content-between">
        <a href="{{ route('leads.index') }}" class="btn btn-secondary">Ver Leads</a>
        <a href="{{ route('home.index') }}" class="btn btn-secondary">Página Principal</a>
    </div>
</div>

@endsection
