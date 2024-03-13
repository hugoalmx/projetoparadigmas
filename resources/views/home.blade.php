@extends('master')

@section('content')

<style>
    body {
        background-color: #343a40; 
        font-family: Arial, sans-serif; 
        color: #ffffff;
        opacity: 0;
        animation: fadeIn 1s forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0; 
        to {
            opacity: 1;
        }
    }

    h1 {
        font-weight: bold; 
        margin-top: 20px;
        text-align: center;
        color: #6c757d;
    }

    .container {
        max-width: 600px; 
        margin: 0 auto; 
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
        color: #000000;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-danger {
        position: absolute;
        top: 20px;
        right: 20px;
    }
</style>

<div class="container">
    <h1>Bem-vindo ao Gerenciamento de Leads</h1>
    <p><strong>O Gerenciamento de Leads permite que você visualize, edite e exclua leads cadastrados no sistema de forma simples e intuitiva.</strong></p>
    <p>Após entender como o sistema funciona, clique no botão abaixo para começar a <strong>gerenciar os leads:</strong></p>
    
    <a href="{{ route('leads.index') }}" class="btn btn-primary">Gerenciar Leads</a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Sair</button>
    </form>
</div>

@endsection
