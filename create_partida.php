<?php
include 'db.php';
$times = [];
$result = $conn->query("SELECT id, nome FROM times");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $times[] = $row;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $time_casa = $_POST['time_casa'];
    $time_fora = $_POST['time_fora'];
    $data_jogo = $_POST['data_jogo'];
    $gols_casa = $_POST['gols_casa'];
    $gols_fora = $_POST['gols_fora'];

    $sql = "INSERT INTO partidas (time_casa_id, time_fora_id, data_jogo, gols_casa, gols_fora) 
            VALUES ('$time_casa', '$time_fora', '$data_jogo', '$gols_casa', '$gols_fora')";
    if ($conn->query($sql) === true) {
        header("Location: create.php?show=partidas");
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
    <title>Adicionar Nova Partida</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>

<body>
    <h2 class="titulo-times">Adicionar Nova Partida</h2>
    <form method="POST">
        <label>Time Casa:</label>
        <select name="time_casa" required>
            <option value="">Selecione</option>
            <?php foreach ($times as $time): ?>
                <option value="<?= $time['id'] ?>"><?= htmlspecialchars($time['nome']) ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label>Time Fora:</label>
        <select name="time_fora" required>
            <option value="">Selecione</option>
            <?php foreach ($times as $time): ?>
                <option value="<?= $time['id'] ?>"><?= htmlspecialchars($time['nome']) ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label>Data do Jogo:</label>
        <input type="date" name="data_jogo" required>
        <br><br>
        <label>Gols Casa:</label>
        <input type="number" name="gols_casa" value="0" required>
        <br><br>
        <label>Gols Fora:</label>
        <input type="number" name="gols_fora" value="0" required>
        <br><br>
        <input type="submit" value="Adicionar Partida">
    </form>
    <br>
    <a href="create.php?show=partidas" class="btn-voltar">Voltar para Partidas</a>
</body>

</html>