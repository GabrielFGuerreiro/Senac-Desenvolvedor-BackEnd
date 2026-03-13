<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar Turmas</title>
</head>
<body>
    <form action="" method="post">
        <label for="nomeTurma">Digite o nome da Turma</label>
        <input id="nomeTurma" name="nomeTurma" type="text" required>

        <input type="submit">
        <a class="botao-lista principal" href="menu.php">Voltar</a>
    </form>
    
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo '<h3>Turma cadastrada!</h3>';

    $nomeTurma = $_POST['nomeTurma'];
    $qnt = 0;
    if(file_exists("turmas.txt"))
    {
        $dados = file_get_contents("turmas.txt");
        $qnt = substr_count($dados, $nomeTurma);
    }
    file_put_contents("turmas.txt",($nomeTurma . ($qnt == 0 ? "" : $qnt+1)).PHP_EOL, FILE_APPEND);
    exit();
}

?>
