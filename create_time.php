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

<h2>Adicionar Novo Time</h2>
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
<a href="times.php">Voltar para Times</a>
?>