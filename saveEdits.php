<?php
include_once 'config.php';

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email', telefone='$telefone', sexo='$sexo', cidade='$cidade',
                    estado='$estado', endereco='$endereco', senha='$senha' WHERE id='$id'";

    $stmt = $myPDO->prepare($sql);
    $stmt->execute();
}

header('Location: system.php');
