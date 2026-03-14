<?php
    session_start();

    $msg = "";
    if (!isset($_SESSION['notas'])) {
        $msg .= "Não é Possível Calcular a Média.<br>Cadastre um Aluno Primeiro.";
        
    }
    else {
        $mediaTurma = 0;    
        for($i=0; $i < 10; $i++)
        {
            if(!empty($_SESSION['notas'][$i]))
            {
                $mediaTurma += $_SESSION['notas'][$i];
            }
        }
        $msg .= "<p>A média da turma é: " . ($mediaTurma / 10) . "</p>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média da Turma</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Média da Turma</h1>
        <?php echo $msg; ?>
        <a href="index.php" class="btnVoltar">Voltar</a>
    </div>
</body>
</html>