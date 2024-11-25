@extends('master')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bem-vindo ao Gerenciamento de Leads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<div class="row justify-content-center mt-5">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header text-center">
                <h1 class="card-title">Bem-vindo ao Gerenciamento de Leads</h1>
            </div>
            <div class="card-body text-center">
                <p class="mb-4">Gerencie seus leads de forma eficiente com nosso sistema.</p>
                <div class="d-grid gap-3">
                    <a href="{{ route('register') }}" class="btn btn-primary">Cadastre-se</a>
                    <a href="{{ route('login') }}" class="btn btn-secondary">Faça Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
