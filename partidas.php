<?php
include 'db.php';

$sql = "SELECT p.id, 
               tc.nome AS time_casa, 
               tf.nome AS time_fora, 
               p.data_jogo, 
               p.gols_casa, 
               p.gols_fora
        FROM partidas p
        JOIN times tc ON p.time_casa_id = tc.id
        JOIN times tf ON p.time_fora_id = tf.id";
$result = $conn->query($sql);
?>

<h2 class="titulo-times">Partidas</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Time Casa</th>
        <th>Time Fora</th>
        <th>Data</th>
        <th>Gols Casa</th>
        <th>Gols Fora</th>
    </tr>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['time_casa']) ?></td>
                <td><?= htmlspecialchars($row['time_fora']) ?></td>
                <td><?= htmlspecialchars($row['data_jogo']) ?></td>
                <td><?= $row['gols_casa'] ?></td>
                <td><?= $row['gols_fora'] ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="6">Nenhuma partida cadastrada.</td></tr>
    <?php endif; ?>
</table>
<br>
<a href="create_partida.php" class="btn-nova-partida">Adicionar Nova Partida</a>
<br><br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="reset.css">
</head>
<body>
    
</body>
</html>