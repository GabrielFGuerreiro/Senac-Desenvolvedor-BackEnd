<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <label for="matriculaBusca">Matrícula:</label>
        <input type="text" name="matriculaBusca">
        <button>Buscar</button>
        <a href="index.php" class="btnVoltar">Voltar</a>
    </form>
</body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

        echo "<div class='container'>";

        if(!empty(($_SESSION['matriculas'])))
        {
            $matriculaBusca = $_POST['matriculaBusca'];
            $indexAlunos = [];
            if(!empty($matriculaBusca))
            {
                for ($i=0; $i < COUNT($_SESSION['matriculas']); $i++) { 
                    if(str_contains(strtoupper($_SESSION['matriculas'][$i]), strtoupper($matriculaBusca)))    
                        $indexAlunos[] = $i;
                } 

                if($indexAlunos == [])
                {
                    echo "Aluno Não Encontrado.";
                    echo "</div>";
                    exit();
                } 
            }
            
            echo "<table border='1'><tr>";
            echo "<th>Matrícula</th>";
            echo "<th>Nome</th>";
            echo "<th>Média Final</th>";
            echo "<th>Qnt de Faltas</th>";
            echo "<th>Situação</th>";
            echo "<th>Editar</th>";
            echo "<th>Excluir</th></tr>";
            for ($i = 0; $i < COUNT($_SESSION['matriculas']); $i++) {
                if(empty($indexAlunos) || in_array($i, $indexAlunos)) {
                    $situacao = "Reprovado";
                    $media = ($_SESSION['notas1'][$i] + $_SESSION['notas2'][$i]) / 2;
                    $percentualFaltas = $_SESSION['faltas'][$i] / 256 * 100;

                    if($media  >= 7 && $percentualFaltas < 25) {
                        $situacao = "Aprovado";
                    }

                    echo "<tr><td>" . $_SESSION['matriculas'][$i] . "</td>";
                    echo "<td>" . $_SESSION['nomes'][$i] . "</td>";
                    echo "<td>" . $media . "</td>";
                    echo "<td>" . $_SESSION['faltas'][$i] . " (" . number_format($percentualFaltas, 2) . "%)</td>";
                    echo "<td>" . $situacao . "</td>";
                    echo "<td><a href='cadastrarAlunos.php?idAluno=" . $i . "' class='btnEditar'>Editar</a></td>";
                    echo "<td><a href='cadastrarAlunos.php?idAluno=" . $i . "' class='btnEditar'>Excluir</a></td></tr>";
                }
            }
            echo "</table>";
        }
        else {
            echo "Nenhum Aluno Cadastrado.";
        }       
    }
?>