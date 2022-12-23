<?php
include_once 'config.php';

if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $stmt = $myPDO->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();

    if (!$result) {
        header('Location: system.php');
    } else {
        try {
            $nome = $result['nome'];
            $email = $result['email'];
            $telefone = $result['telefone'];
            $sexo = $result['sexo'];
            $cidade = $result['cidade'];
            $estado = $result['estado'];
            $endereco = $result['endereco'];
            $senha = $result['senha'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
} else {
    header('Location: system.php');
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
<a href="system.php" class="btn btn-light">Voltar</a>
<div class="container">
    <div class="d-flex flex-column">
        <div class="row justify-content-center">
            <div class="col-4 card p-4 mt-2 bg-transparent">
                <form action="saveEdits.php" method="POST" class="p-1">
                    <fieldset>
                        <legend class="fw-bold">Formulario de Criação</legend>
                        <br>
                        <div class="row px-2">
                            <input type="text" name="nome" id="nome"
                                   class="p-2" placeholder="Nome Completo"
                                   value="<?php echo $nome ?>" required/>
                        </div>
                        <br>
                        <div class="row px-2">
                            <input type="text" name="senha" id="senha"
                                   class="p-2" placeholder="Senha"
                                   value="<?php echo $senha ?>" required/>
                        </div>
                        <br>
                        <div class="row px-2">
                            <input type="email" name="email" id="email"
                                   class="p-2" placeholder="Email"
                                   value="<?php echo $email ?>" required/>
                        </div>
                        <br>
                        <div class="row px-2">
                            <input type="tel" name="telefone" id="telefone"
                                   class="p-2" placeholder="Telefone"
                                   value="<?php echo $telefone ?>" required/>
                        </div>
                        <br>
                        <div>
                            <p>Sexo:</p>
                            <input type="radio" id="feminino" name="genero" value="feminino"
                                <?php echo $sexo == 'feminino' ? 'checked' : '' ?> required/>
                            <label for="feminino">Feminino</label>
                            <input type="radio" id="masculino" name="genero" class="ms-3" value="masculino"
                                <?php echo $sexo == 'masculino' ? 'checked' : '' ?> required/>
                            <label for="masculino">Masculino</label>
                            <input type="radio" id="outro" name="genero" class="ms-3" value="outro"
                                <?php echo $sexo == 'outro' ? 'checked' : '' ?> required/>
                            <label for="outro">Outro</label>
                        </div>
                        <br>
                        <div class="row px-2">
                            <input type="tel" name="cidade" id="cidade"
                                   class="p-2" placeholder="Cidade"
                                   value="<?php echo $cidade ?>" required/>
                        </div>
                        <br>
                        <div class="row px-2">
                            <input type="tel" name="estado" id="estado"
                                   class="p-2" placeholder="Estado"
                                   value="<?php echo $estado ?>" required/>
                        </div>
                        <br>
                        <div class="row px-2">
                            <input type="tel" name="endereco" id="endereco"
                                   class="p-2" placeholder="Endereço"
                                   value="<?php echo $endereco ?>" required/>
                        </div>
                        <br>
                        <input type="hidden" name="id" value="<?php echo $id ?>"/>
                        <button type="submit" name="update" id="update" class="btn btn-primary w-100">Enviar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
