@extends('master')

@section('content')

<div class="container">
    <h1>Gerenciamento de Leads</h1>
    <p><strong>Bem-vindo!</strong> Este sistema foi projetado para simplificar e otimizar o gerenciamento de leads cadastrados. Aqui, você pode:</p>
    <ul>
        <li>Acompanhar e gerenciar os <strong>dados dos seus leads</strong>.</li>
        <li>Criar e organizar <strong>registros de contato</strong> para cada lead.</li>
        <li>Visualizar e editar informações de forma prática e intuitiva.</li>
    </ul>
    <p>Explore as funcionalidades disponíveis e aproveite para manter seus leads sempre bem organizados!</p>

    <div class="d-flex justify-content-center align-items-center gap-3 mt-3">
    <a href="{{ route('leads.index') }}" class="btn btn-primary btn-sm">Gerenciar Leads</a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" type="submit">Sair do Sistema</button>
    </form>
</div>

</div>

@endsection
