<?php

include 'db.php';

$times = [];
$result = $conn->query("SELECT id, nome FROM times");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $times[] = $row;
    } // pesquisei
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {

    $nome = $_POST['nome'];
    $posicao = $_POST['posicao'];
    $numero_camisa = $_POST['numero_camisa'];
    $time_id = $_POST['time_id'];

    $sql = "INSERT INTO jogadores (nome, posicao, numero_camisa, time_id) VALUES ('$nome','$posicao', '$numero_camisa', '$time_id')";

    if ($conn->query($sql) === true) {
        echo "Novo Registro no Banco!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header("Location: create.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>

<body>
    <form method="POST" action="create.php">
        <label for="nome">Nome e Sobrenome:</label>
        <input type="text" name="nome" required>
        <br><br>
        <label for="posicao">Posição</label>
        <select name="posicao" required>
            <option value="">Selecione uma posição</option>
            <?php
            $posicoes_result = $conn->query("SELECT DISTINCT posicao FROM jogadores");
            if ($posicoes_result) {
                while ($pos = $posicoes_result->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($pos['posicao']) . '">' . htmlspecialchars($pos['posicao']) . '</option>';
                }
            }
            ?>
        </select>
        <br><br>
        <label for="numero_camisa">Nº Camisa:</label>
        <input type="number" name="numero_camisa" required>
        <br><br>
        <label for="time_id">Time:</label>
        <select name="time_id" required>
            <option value="">Selecione um time</option>
            <?php foreach ($times as $time): ?>
                <option value="<?php echo $time['id']; ?>"><?php echo htmlspecialchars($time['nome']); ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <input type="submit" name="create" value="Adicionar">
    </form>

    <br><br>
    <div id="tabela_de_consulta">
        <?php
        include 'read.php';
        ?>
    </div>
</body>

</html>