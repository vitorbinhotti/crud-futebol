<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['create']))) {

    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuario (name, email) VALUE ('$name','$email')";

    if ($conn->query($sql) == true) {
        echo "Novo Registro no Banco!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->$error;
    };
    $conn->close();
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>
    <form method="POST" action="create.php">
        <label for="name">Nome e Sobrenome:</label>
        <input type="text" name="name" required>
        <br><br>
        <label for="text">Posição:</label>
        <input type="text" name="text" required>
        <br><br>
        <label for="text">Nº Camisa:</label>
        <input type="text" name="text" required>
        <br><br>
        <input type="submit" name="create" value="Adicionar">
    </form>

    <div id="tabela_de_consulta">

        <?php
        include 'read.php';
        ?>

    </div>
</body>

</html>