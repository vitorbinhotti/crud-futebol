<?php
include 'db.php';

$result = $conn->query("SELECT * FROM times");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Times</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/reset.css">
</head>

<body>
    <h2 class="titulo-times">Times</h2>
    <a href="create_time.php" class="btn-times">Adicionar Novo Time</a>
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
            <tr>
                <td colspan="4">Nenhum time cadastrado.</td>
            </tr>
        <?php endif; ?>
    </table>
    <br>
    <a href="create.php" class="btn-voltar">Voltar</a>
</body>

</html>