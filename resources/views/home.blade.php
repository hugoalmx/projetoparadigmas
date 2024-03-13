@extends('master')

@section('content')

<style>
    body {
        background-color: #343a40; /* Cor de fundo cinza escuro */
        font-family: Arial, sans-serif; /* Fonte Arial */
        color: #ffffff; /* Cor do texto branco */
        opacity: 0; /* Começa com opacidade 0 para a animação de fade-in */
        animation: fadeIn 1s forwards; /* Animação de fade-in com duração de 1 segundo */
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
        padding: 20px; /* Adiciona um espaçamento interno */
        background-color: #f8f9fa; /* Cor de fundo do conteúdo */
        border-radius: 8px; /* Adiciona cantos arredondados */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Adiciona sombra */
    }

    p {
        font-size: 16px; /* Tamanho da fonte do parágrafo */
        line-height: 1.6; /* Altura da linha do parágrafo */
        margin-bottom: 20px; /* Espaçamento inferior do parágrafo */
        color: #000000; /* Cor do texto preto */
    }

    .btn-primary {
        background-color: #007bff; /* Cor de fundo azul do botão */
        border-color: #007bff; /* Cor da borda do botão azul */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Cor de fundo azul mais escura no hover */
        border-color: #0056b3; /* Cor da borda azul mais escura no hover */
    }

    .btn-danger {
        position: absolute; /* Posição absoluta */
        top: 20px; /* Distância do topo */
        right: 20px; /* Distância da direita */
    }
</style>

<div class="container">
    <h1>Bem-vindo ao Gerenciamento de Leads</h1>
    <p><strong>O Gerenciamento de Leads permite que você visualize, edite e exclua leads cadastrados no sistema de forma simples e intuitiva.</strong></p>
    <p>Após entender como o sistema funciona, clique no botão abaixo para começar a <strong>gerenciar os leads:</strong></p>
    <!-- Botão para ir para a página de usuários -->
    <a href="{{ route('leads.index') }}" class="btn btn-primary">Gerenciar Leads</a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Sair</button>
    </form>
</div>

@endsection
