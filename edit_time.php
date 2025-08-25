<?php
include 'db.php';

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    $sql = "UPDATE times SET nome='$nome', cidade='$cidade' WHERE id=$id";
    if ($conn->query($sql) === true) {
        header("Location: times.php");
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM times WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Time</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/reset.css">
</head>

<body>
    <h2 class="titulo-times">Editar Time</h2>
    <form method="POST">
        <label>Nome do Time:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($row['nome']) ?>" required>
        <br><br>
        <label>Cidade:</label>
        <input type="text" name="cidade" value="<?= htmlspecialchars($row['cidade']) ?>" required>
        <br><br>
        <input type="submit" value="Salvar Alterações">
    </form>
    <br>
    <a href="times.php" class="btn-voltar">Voltar para Times</a>
</body>

</html>