<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    $sql = "INSERT INTO times (nome, cidade) VALUES ('$nome', '$cidade')";
    if ($conn->query($sql) === true) {
        header("Location: times.php");
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Novo Time</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>

<body>
    <h2 class="titulo-times">Adicionar Novo Time</h2>
    <form method="POST">
        <label>Nome do Time:</label>
        <input type="text" name="nome" required>
        <br><br>
        <label>Cidade:</label>
        <input type="text" name="cidade" required>
        <br><br>
        <input type="submit" value="Adicionar Time">
    </form>
    <br>
    <a href="times.php" class="btn-voltar">Voltar para Times</a>
</body>

</html>