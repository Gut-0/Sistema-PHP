<?php
include_once 'config.php';
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    $sql = "SELECT * FROM usuarios WHERE email = :email and senha = :senha";
    $stmt = $myPDO->prepare($sql);

    $dados = array(
        ':email' => $_POST['email'],
        ':senha' => $_POST['senha']
    );

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt->execute($dados);
    $result = $stmt->fetch();

    if (!$result) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: screenLogin.php');
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: system.php');
    }
}

