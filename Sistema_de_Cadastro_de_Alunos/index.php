<?php 
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro de Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container menu">
        <form action="" method="post" style="align-items: center;">
            <h1>Sistema de Cadastro de Alunos</h1>
            <button type="button" onclick="window.location.href='cadastrarAlunos.php'">Cadastrar Alunos</button>
            <button type="button" onclick="window.location.href='listarAlunos.php'">Listar Alunos</button>
            <button type="button" onclick="window.location.href='calcularMediaTurma.php'">Calcular Média</button>
            <button type="submit" class="btnSair">Sair</button>
        </form>
    </div>
</body>
</html>

