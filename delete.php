<?php
include_once 'config.php';

if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $stmt = $myPDO->prepare($sql);
    $stmt->execute();

    if (!$stmt) {
        header('Location: system.php');
    } else {
        try {
            $sqlDelete = "DELETE FROM usuarios WHERE id=$id";
            $stmtDelete = $myPDO->prepare($sqlDelete);
            $stmtDelete->execute();
            header('Location: system.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
