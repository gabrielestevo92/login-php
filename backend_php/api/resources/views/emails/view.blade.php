<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            color: #007bff;
        }
        p {
            font-size: 16px;
        }
        .code {
            font-weight: bold;
            font-size: 20px;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmação de Cadastro</h1>
        <p>Olá, {{ $email }}!</p>
        <p>Obrigado por se registrar em nosso site. Para concluir seu cadastro, utilize o seguinte código:</p>
        <p class="code">{{ $code }}</p>

    </div>
</body>
</html>
