<?php

include 'db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT id, nome FROM times");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $times[] = $row;
    } // pesquisei
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $posicao = $_POST['posicao'];
    $numero_camisa = $_POST['numero_posicao'];
    $time_id = $_POST['time_id'];

    $sql = "UPDATE jogadores SET nome = '$nome', posicao = '$posicao', numero_camisa = '$numero_camisa', time_id = '$time_id' WHERE id = $id";
    $sql = "UPDATE jogadores SET nome = '$nome', posicao = '$posicao', numero_camisa = '$numero_camisa', time_id = '$time_id' WHERE id = $id";

    if ($conn->query($sql) == true) {
    echo 
    "<div style='
        background-color: #d4edda; 
        color: #155724; 
        padding: 15px; 
        margin: 20px 0; 
        border: 2px solid #c3e6cb; 
        border-radius: 8px; 
        font-weight: bold; 
        text-align: center; 
        font-size: 18px;'>
        Nova Atualização no Banco! 
    <br><br>
    <a href='create.php' style='
        display: inline-block;
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        transition: 0.2s;
    ' 
    onmouseover=\"this.style.backgroundColor='#218838'\" 
    onmouseout=\"this.style.backgroundColor='#28a745'\">
        Ok
    </a>
</div>";

    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    exit;
}
$sql = "SELECT * FROM jogadores WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>

<body>
    <form method="POST" action="update.php?id=<?php echo $row['id']; ?>">
        <p>Edite o nome do JOGADOR</p>
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
            } // pesquisei
            ?>
        </select>
        <br><br>
        <label for="numero_camisa">Nº Camisa</label>
        <input type="text" name="numero_posicao" required>
        <br><br>
        <select name="time_id" required>
            <option value="">Selecione um time</option>
            <?php foreach ($times as $time): ?>
                <option value="<?php echo $time['id']; ?>"><?php echo htmlspecialchars($time['nome']); ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <input type="submit" value="Atualizar">
        <br><br>

    </form>

    <div id="tabela_de_consulta">

        <?php
        include 'read.php';
        ?>

    </div>
</body>

</html>