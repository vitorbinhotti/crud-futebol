<?php

include "db.php";

$sql = "SELECT jogadores.*, times.nome AS nome_time 
    FROM jogadores 
    LEFT JOIN times ON jogadores.time_id = times.id";
$result = $conn->query($sql); // pesquisei

if ($result->num_rows > 0) {
    echo "<table border='1'><tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Posição</th>
    <th>Camisa</th>
    <th>Time</th>
    <th>Ações</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['nome']}</td>
        <td>{$row['posicao']}</td>
        <td>{$row['numero_camisa']}</td>
        <td>{$row['nome_time']}</td>
        <td>
        <a href='update.php?id={$row['id']}'>Editar</a>
        <a href='delete.php?id={$row['id']}'>Excluir</a>
        </td>
    </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn->close();
?>