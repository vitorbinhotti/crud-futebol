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

<h2>Editar Time</h2>
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
<a href="times.php">Voltar para Times</a>
?>