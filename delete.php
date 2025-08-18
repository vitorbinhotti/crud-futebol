<?php

include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM jogadores WHERE id=$id";

if ($conn->query($sql) == true) {
        echo "<br>";
        echo "Novo Registro no Banco!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->$error;
    };
    $conn -> close();
    header("Location: create.php");
?>