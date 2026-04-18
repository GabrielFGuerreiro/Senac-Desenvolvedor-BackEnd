<?php
session_start();
if (!isset($_SESSION["matriculas"])) {
    $_SESSION["matriculas"] = [];
    $_SESSION["nomes"] = [];
    $_SESSION["notas1"] = [];
    $_SESSION["notas2"] = [];
    $_SESSION["faltas"] = [];
}

$idAlunoEditar = null;
$textoBotao = "Cadastrar";
if(isset($_GET['idAlunoEditar']))
{
    $idAlunoEditar = $_GET['idAlunoEditar'];
    $textoBotao = "Editar";
}   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastrar Aluno</h1>
    <form action="" method="post">
        <label for="matricula">Matrícula:</label>
        <input type="text" <?php if (!empty($idAlunoEditar) || $idAlunoEditar == 0) { echo 'value="' . $_SESSION["matriculas"][$idAlunoEditar] . '"'; } ?>id="matricula" name="matricula" required>

        <label for="nome">Nome:</label>
        <input type="text" <?php if (!empty($idAlunoEditar) || $idAlunoEditar == 0) { echo 'value="' . $_SESSION["nomes"][$idAlunoEditar] . '"'; } ?> id="nome" name="nome" required>

        <label for="nota1">Nota 1:</label>
        <input type="number" <?php if (!empty($idAlunoEditar) || $idAlunoEditar == 0) { echo 'value="' . $_SESSION["notas1"][$idAlunoEditar] . '"'; } ?> id="nota1" name="nota1" min="0" max="10" required>

        <label for="nota2">Nota 2:</label>
        <input type="number" <?php if (!empty($idAlunoEditar) || $idAlunoEditar == 0) { echo 'value="' . $_SESSION["notas2"][$idAlunoEditar] . '"'; } ?> id="nota2" name="nota2" min="0" max="10" required>

        <label for="falta">Nº de Faltas</label>
        <input type="number" <?php if (!empty($idAlunoEditar) || $idAlunoEditar == 0) { echo 'value="' . $_SESSION["faltas"][$idAlunoEditar] . '"'; } ?> id="falta" name="falta" min="0" required>

        <button type="submit"><?php echo $textoBotao; ?></button>
    </form>
    <a href="index.php" class="btnVoltar">Voltar</a>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($idAlunoEditar))
    {   
        array_push($_SESSION["matriculas"], $_POST["matricula"]);
        array_push($_SESSION["nomes"], $_POST["nome"]);
        array_push($_SESSION["notas1"], $_POST["nota1"]);
        array_push($_SESSION["notas2"], $_POST["nota2"]);
        array_push($_SESSION["faltas"], $_POST["falta"]);    
        echo "Aluno Cadastrado com Sucesso.";
    }
    else {           
        $_SESSION["matriculas"][$idAlunoEditar] = $_POST["matricula"];
        $_SESSION["nomes"][$idAlunoEditar] = $_POST["nome"];
        $_SESSION["notas1"][$idAlunoEditar] = $_POST["nota1"];
        $_SESSION["notas2"][$idAlunoEditar] = $_POST["nota2"];
        $_SESSION["faltas"][$idAlunoEditar] = $_POST["falta"];    
        echo "Aluno Editado com Sucesso.";
    }
}
?>
