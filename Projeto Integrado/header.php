<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newcond</title>

    <link rel="stylesheet" href="/style/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">


    <style>
        .carousel {
            width: 100%;
            display: flex;
            overflow: hidden;
        }

        .carousel-slide {
            width: 100%;
            flex-shrink: 0;
            transition: transform 0.5s ease;
        }

        .carousel-slide img {
            width: 100%;
            height: auto;
        }

        .carousel-controls {
            margin-top: 10px;
        }

        .carousel-controls button {
            margin-right: 5px;
        }
    </style>

    <style>
        .conteudo_cliente {
            margin-top: 20px;
        }

        .table {
            width: 100%;
            border: 1px solid #ccc;
        }

        .table th {
            background-color: #6c63ff;
            color: #fff;
            padding: 8px;
            text-align: left;
        }

        .table td {
            padding: 8px;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table a {
            color: #6c63ff;
            text-decoration: none;
        }

        .table a:hover {
            text-decoration: underline;
        }
    </style>

    <style>
        .login-box {
            display: none;
            position: fixed;
            top: 50px;
            right: 20px;
            width: 300px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-box form {
            margin-top: 2px;
        }

        .login-box .input-group {
            margin-bottom: 10px;
        }

        .login-box .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .login-box .input-group input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .login-box button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>

    <style>
        .btn-container {
            margin-bottom: -5px;
            margin-top: 15px;
        }

        .btn-custom {
            margin-bottom: 10px;
            background-color: #6c63ff;
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #5a50d6;
        }

        .table-container {
            margin-bottom: 20px;
        }
    </style>





</head>

<body>
    <header>
        <div class="container">
            <a href="?pagina=home"><img src="img/logo.jpg" title="Logo" alt="Logo" class="logo"></a>
            <div id="menu">
                <a href="?pagina=inquilino">Cadastro Inquilino</a>
                <a href="?pagina=visitante" id="cadastro-visitante-link">Cadastro Visitante</a>
            </div>
        </div>
    </header>

    <div class="container">
        <div id="cadastro-visitante-box" class="login-box">
            <form action="autenticar.php" method="POST">
                <div class="input-group">
                    <input type="text" id="id" name="id" placeholder="Usuário" required>
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Senha" required>
                </div>
                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>
    <div id="conteudo" class="container">

        <script>
            const cadastroVisitanteLink = document.getElementById('cadastro-visitante-link');

            const cadastroVisitanteBox = document.getElementById('cadastro-visitante-box');

            cadastroVisitanteLink.addEventListener('click', function(event) {
                event.preventDefault();

                if (cadastroVisitanteBox.style.display === 'block') {
                    cadastroVisitanteBox.style.display = 'none';
                } else {
                    cadastroVisitanteBox.style.display = 'block';
                }
            });
        </script>