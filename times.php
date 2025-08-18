<?php
include 'db.php';

$result = $conn->query("SELECT * FROM times");
?>

<h2>Times</h2>
<a href="create_time.php">Adicionar Novo Time</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Cidade</th>
        <th>Ações</th>
    </tr>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['nome']) ?></td>
                <td><?= htmlspecialchars($row['cidade']) ?></td>
                <td>
                    <a href="edit_time.php?id=<?= $row['id'] ?>">Editar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="4">Nenhum time cadastrado.</td></tr>
    <?php endif; ?>
</table>
<br>
<a href="create.php">Voltar</a>
?>