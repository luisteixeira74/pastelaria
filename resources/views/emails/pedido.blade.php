<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
        }
        .email-content {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-content">
        <h1>Novo Pedido #{{ $pedidoId }}</h1>
        <p>Cliente: {{ $clienteNome }}</p>
        <div>
            <p>Produtos:</p>
            <p>Pastel de Queijo</p>
            <img src="{{asset('public/pasteis-images/pastel_img1.png')}}">
        </div>
    </div>
</div>
</body>
</html>