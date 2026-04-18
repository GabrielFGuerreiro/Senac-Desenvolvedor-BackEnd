<?php
session_start();
if (!isset($_SESSION["matriculas"])) {
    $_SESSION["matriculas"] = [];
    $_SESSION["nomes"] = [];
    $_SESSION["notas1"] = [];
    $_SESSION["notas2"] = [];
    $_SESSION["faltas"] = [];
}

$idAluno = $_GET['idAluno'];
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
        <input type="text" value="<?=$_SESSION["matriculas"][$idAluno]?>" id="matricula" name="matricula" required>

        <label for="nome">Nome:</label>
        <input type="text" value="<?=$_SESSION["nomes"][$idAluno]?>" id="nome" name="nome" required>

        <label for="nota1">Nota 1:</label>
        <input type="number" value="<?=$_SESSION["notas1"][$idAluno]?>" id="nota1" name="nota1" min="0" max="10" required>

        <label for="nota2">Nota 2:</label>
        <input type="number" value="<?=$_SESSION["notas2"][$idAluno]?>" id="nota2" name="nota2" min="0" max="10" required>

        <label for="falta">Nº de Faltas</label>
        <input type="number" value="<?=$_SESSION["faltas"][$idAluno]?>" id="falta" name="falta" min="0" required>

        <button type="submit">Cadastrar</button>
    </form>
    <a href="index.php" class="btnVoltar">Voltar</a>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    echo $idAluno;
    if($idAluno != null)
    {   
        echo "Aluno Cadastrado com Sucesso.";
        array_push($_SESSION["matriculas"], $_POST["matricula"]);
        array_push($_SESSION["nomes"], $_POST["nome"]);
        array_push($_SESSION["notas1"], $_POST["nota1"]);
        array_push($_SESSION["notas2"], $_POST["nota2"]);
        array_push($_SESSION["faltas"], $_POST["falta"]);    
    }
    else {
                
        $_SESSION["matriculas"][(int)$idAluno] = $_POST["matricula"];
        $_SESSION["nomes"][(int)$idAluno] = $_POST["nome"];
        $_SESSION["notas1"][(int)$idAluno] = $_POST["nota1"];
        $_SESSION["notas2"][(int)$idAluno] = $_POST["nota2"];
        $_SESSION["faltas"][(int)$idAluno] = $_POST["falta"];    
    }
}
?>
