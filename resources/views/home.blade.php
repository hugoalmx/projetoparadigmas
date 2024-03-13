@extends('master')

@section('content')

<style>
    body {
        background-color: #343a40; 
        font-family: Arial, sans-serif; /* Fonte Arial */
        color: #ffffff; /* Cor do texto branco */
        opacity: 0;
        animation: fadeIn 1s forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0; /* Começa com opacidade 0 */
        }
        to {
            opacity: 1; /* Termina com opacidade 1 */
        }
    }

    h1 {
        font-weight: bold; /* Texto em negrito */
        margin-top: 20px; /* Espaçamento superior */
        text-align: center; /* Alinhamento central */
        color: #6c757d; /* Cor do título cinza escuro */
    }

    .container {
        max-width: 600px; /* Define a largura máxima do conteúdo */
        margin: 0 auto; /* Centraliza o conteúdo horizontalmente */
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
