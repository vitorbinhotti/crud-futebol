<?php

include "db.php";

$sql = "SELECT * FROM jogadores";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Posição</th>
    <th>Camisa</th>
    <th>Time ID</th>
    <th>Ações</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['posicao']}</td>
            <td>{$row['numero_camisa']}</td>
            <td>{$row['time_id']}</td>
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