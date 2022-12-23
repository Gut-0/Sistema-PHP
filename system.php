<?php
include_once 'config.php';
session_start();

if (!isset($_SESSION['email']) and !isset($_SESSION['senha'])) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: screenLogin.php');
} else {
    $logado = $_SESSION['email'];
}

if (!empty($_GET['search'])){
    try {
        $data = $_GET['search'];
        $sql = "SELECT * FROM usuarios WHERE nome LIKE '%$data%' or email LIKE '%$data%' or sexo LIKE '%$data%' ORDER BY id";
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}else {
    $sql = "SELECT * FROM usuarios ORDER BY id";
}
$stmt = $myPDO->prepare($sql);
$stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="src/css/style-sistema.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Sistema</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Sistema</a>
    </div>
    <div class="d-flex">
        <a href="logout.php" class="btn btn-danger me-3">Sair</a>
    </div>
</nav>
<?php
echo "<h1 class='text-white text-center mt-5'>Bem vindo <u>$logado</u></h1>";
?>
<div class="d-flex justify-content-center mt-3">
    <input type="search" class="form-control w-25 me-1" placeholder="Pesquisar" id="pesquisar" />
    <button onclick="searchData()" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
    </button>
    <button onclick="reloadPage()" class="btn btn-primary mx-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
        </svg>
    </button>
</div>
<div class="container mt-5 table-bg rounded">
    <table class="table">
        <thead>
        <tr class="text-white">
            <th scope="col">id</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Sexo</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>
            <th scope="col">Endereço</th>
            <th scope="col">Senha</th>
            <th scope="col">...</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($user_data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr class='text-white'>";
            echo "<td>" . $user_data['id'] . "</td>";
            echo "<td>" . $user_data['nome'] . "</td>";
            echo "<td>" . $user_data['email'] . "</td>";
            echo "<td>" . $user_data['telefone'] . "</td>";
            echo "<td>" . $user_data['sexo'] . "</td>";
            echo "<td>" . $user_data['cidade'] . "</td>";
            echo "<td>" . $user_data['estado'] . "</td>";
            echo "<td>" . $user_data['endereco'] . "</td>";
            echo "<td>" . $user_data['senha'] . "</td>";
            echo "<td>
                    <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                          <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                        </svg>
                    </a>
                    <a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                          <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                          <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                        </svg>
                    </a>
                  </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
<script src="src/js/search.js"></script>
</html>


