<?php
include_once 'config.php';

if (isset($_POST['submit'])) {

    $sql = "INSERT INTO usuarios
                (nome, email, telefone, sexo, cidade, estado, endereco, senha)
                VALUES (:nome, :email, :telefone, :sexo, :cidade, :estado, :endereco, :senha)";
    $stmt = $myPDO->prepare($sql);

    $dados = array(
        ':nome' => $_POST['nome'],
        ':email' => $_POST['email'],
        ':telefone' => $_POST['telefone'],
        ':sexo' => $_POST['genero'],
        ':cidade' => $_POST['cidade'],
        ':estado' => $_POST['estado'],
        ':endereco' => $_POST['endereco'],
        ':senha' => $_POST['senha'],
    );

    $stmt->execute($dados);

    header('Location: screenLogin.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="src/css/style-form-clientes.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Form Novo Cadastro</title>
</head>
<body>
<a href="index.php" class="btn btn-light">Voltar</a>
<div class="container">
    <div class="d-flex flex-column">
        <div class="row justify-content-center">
            <div class="col-4 card p-4 mt-2 bg-transparent">
                <form action="formClients.php" method="POST" class="p-1">
                    <fieldset>
                        <legend class="fw-bold">Formulario de Criação</legend>
                        <br>
                        <div class="row px-2">
                            <input type="text" name="nome" id="nome"
                                   class="p-2" placeholder="Nome Completo" required/>
                        </div>
                        <br>
                        <div class="row px-2">
                            <input type="password" name="senha" id="senha"
                                   class="p-2" placeholder="Senha" required/>
                        </div>
                        <br>
                        <div class="row px-2">
                            <input type="email" name="email" id="email"
                                   class="p-2" placeholder="Email" required/>
                        </div>
                        <br>
                        <div class="row px-2">
                            <input type="tel" name="telefone" id="telefone"
                                   class="p-2" placeholder="Telefone" required/>
                        </div>
                        <br>
                        <div>
                            <p>Sexo:</p>
                            <input type="radio" id="feminino" name="genero" value="feminino" required/>
                            <label for="feminino">Feminino</label>
                            <input type="radio" id="masculino" name="genero" class="ms-3" value="masculino" required/>
                            <label for="masculino">Masculino</label>
                            <input type="radio" id="outro" name="genero" class="ms-3" value="outro" required/>
                            <label for="outro">Outro</label>
                        </div>
                        <br>
                        <div class="row px-2">
                            <input type="tel" name="cidade" id="cidade"
                                   class="p-2" placeholder="Cidade" required/>
                        </div>
                        <br>
                        <div class="row px-2">
                            <input type="tel" name="estado" id="estado"
                                   class="p-2" placeholder="Estado" required/>
                        </div>
                        <br>
                        <div class="row px-2">
                            <input type="tel" name="endereco" id="endereco"
                                   class="p-2" placeholder="Endereço" required/>
                        </div>
                        <br>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary w-100">Enviar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
