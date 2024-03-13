<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
</head>
<body>
    <h1>Bem-vindo à nossa aplicação!</h1>
    
    <p>Esta é a página de boas-vindas padrão.</p>
    
    <p>Se você estiver visualizando esta página, significa que a configuração inicial está funcionando corretamente.</p>
    
    <p>Você pode personalizar esta página de acordo com as necessidades do seu aplicativo.</p>

    
<a href="{{ route('register') }}" class="btn btn-primary">Registre-se</a>

<a href="{{ route('login') }}" class="btn btn-primary">Faça Login</a>
</body>
</html>
