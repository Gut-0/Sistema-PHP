<!DOCTYPE html>
<html lang="en">
<head>
    <link href="src/css/style-login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Tela de login</title>
</head>
<body>
<a href="index.php" class="btn btn-light">Voltar</a>
<div class="container">
    <div class="d-flex flex-column">
        <div class="row justify-content-center">
            <div class="col-4 card-login card p-4 bg-dark">
                <h2 class="mb-3 text-white">Login</h2>
                <form class="d-flex flex-column" action="verifyLogin.php" method="POST">
                    <input type="text" name="email" placeholder="Email" class="p-2 rounded" required/>
                    <br>
                    <input type="password" name="senha" placeholder="Senha" class="p-2 rounded" required/>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
