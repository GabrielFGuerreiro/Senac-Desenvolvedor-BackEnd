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
        <button>Buscar</button><br>
        <a href="index.php" class="btnVoltar">Voltar</a>
    </form>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?> 

    <div class="container"><br>

    <?php if (!empty($_SESSION['matriculas'])): 

            $matriculaBusca = $_POST['matriculaBusca'];
            $idsAlunosBusca = [];

            if (!empty($matriculaBusca)) {
                for ($i = 0; $i < COUNT($_SESSION['matriculas']); $i++) { 
                    if (str_contains(strtoupper($_SESSION['matriculas'][$i]), strtoupper($matriculaBusca)))    
                        $idsAlunosBusca[] = $i;
                }

                if ($idsAlunosBusca == []) {
                    echo "Aluno Não Encontrado.";
                    echo "</div>";
                    exit();
                } 
            }
        ?>

        <table border="1">
            <tr>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Média Final</th>
                <th>Qnt de Faltas</th>
                <th>Situação</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>

            <?php foreach ($_SESSION['matriculas'] as $i => $matricula):
                    $media = ($_SESSION['notas1'][$i] + $_SESSION['notas2'][$i]) / 2;
                    $mediaTurma += $media;
                    //Se há aluno(s) buscado(s) e o aluno atual não é um deles, pula para o próximo.
                    if (!empty($idsAlunosBusca) && !in_array($i, $idsAlunosBusca)){continue;}

                    $percentualFaltas = $_SESSION['faltas'][$i] / 256 * 100;
                    $situacao = ($media >= 7 && $percentualFaltas < 25) ? "Aprovado" : "Reprovado";
                ?>

                <tr>
                    <td><?= $_SESSION['matriculas'][$i] ?></td>
                    <td><?= $_SESSION['nomes'][$i] ?></td>
                    <td><?= $media ?></td>
                    <td>
                        <?= $_SESSION['faltas'][$i] ?> 
                        (<?= number_format($percentualFaltas, 2) ?>%)
                    </td>
                    <td><?= $situacao ?></td>
                    <td>
                        <a href="cadastrarAlunos.php?idAlunoEditar=<?= $i ?>&icExcluir=<?= false ?>" class="btnEditar">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a href="cadastrarAlunos.php?idAlunoEditar=<?= $i ?>&icExcluir=<?= true ?>" class="btnExcluir">
                            Excluir
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>    

        </table>

        <div>
            <div>
                <h3>Média da Turma</h3>
                <?= number_format($mediaTurma/COUNT($_SESSION['matriculas']), 2) ?>
            </div>
            
            <div>
                <h3>Aluno </h3>
            </div>
        </div>

        <?php else: ?>
            Nenhum Aluno Cadastrado.
            
    <?php endif; ?>

    </div>

<?php endif; ?>
</body>
</html>