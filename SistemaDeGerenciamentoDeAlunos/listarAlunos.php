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
    <h1>Lista de Alunos</h1>
        <form action="" method="post">
        <label for="matriculaBusca">Matrícula:</label>
        <input type="text" name="matriculaBusca"><br>

        <div class="radio-group">
            <div>
                <label for="situacaoAprovado">Aprovados</label>
                <input type="radio" name="situacaoBusca" id="situacaoAprovado" value="A">
            </div>

            <div>
                <label for="situacaoReprovado">Reprovados</label>
                <input type="radio" name="situacaoBusca" id="situacaoReprovado" value="R">
            </div>
        </div>

        <button>Buscar</button><br>
    </form>

    <a href="index.php" class="btnVoltar">Voltar</a>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?> 

    <div class="container"><br>

    <?php if (!empty($_SESSION['matriculas'])): ?>

        <?php
            $matriculaBusca = $_POST['matriculaBusca'];
            $idsAlunosBusca = [];

            if (!empty($matriculaBusca)) {
                for ($i = 0; $i < COUNT($_SESSION['matriculas']); $i++) { 
                    if (str_contains(strtoupper($_SESSION['matriculas'][$i]), strtoupper($matriculaBusca)))    
                        $idsAlunosBusca[] = $i;
                }

                if ($idsAlunosBusca == []) {
                    echo "<div class='msg-erro'>Aluno Não Encontrado.</div>";
                    echo "</div>";
                    exit();
                }
            }
        ?>

        <div class="table-wrapper">
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

                <?php 
                    $maiorMedia = -1;
                    $menorMedia = 11;

                    $alunosMaiores = [];
                    $alunosMenores = [];

                    foreach ($_SESSION['matriculas'] as $i => $matricula):

                        $media = ($_SESSION['notas1'][$i] + $_SESSION['notas2'][$i]) / 2;
                        $mediaTurma += $media;

                        if ($media > $maiorMedia) {
                            $maiorMedia = $media;
                            $alunosMaiores = [$i];
                        }
                        elseif ($media == $maiorMedia)
                            $alunosMaiores[] = $i;

                        if ($media < $menorMedia) {
                            $menorMedia = $media;
                            $alunosMenores = [$i];
                        }
                        elseif ($media == $menorMedia)
                            $alunosMenores[] = $i;

                        if (!empty($idsAlunosBusca) && !in_array($i, $idsAlunosBusca)) continue;

                        $percentualFaltas = $_SESSION['faltas'][$i] / 256 * 100;
                        $situacao = ($media >= 7 && $percentualFaltas < 25) ? "Aprovado" : "Reprovado";

                        if($_POST['situacaoBusca'] == 'A' && $situacao =="Reprovado") continue;
                        else if($_POST['situacaoBusca'] == 'R' && $situacao =="Aprovado") continue;
                ?>

                <tr>
                    <td><?= $_SESSION['matriculas'][$i] ?></td>
                    <td><?= $_SESSION['nomes'][$i] ?></td>
                    <td><?= number_format($media, 2) ?></td>
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
        </div>

        <div class="stats">

            <div>
                <h3>Média da Turma</h3>
                <?= number_format($mediaTurma/COUNT($_SESSION['matriculas']), 2) ?>
            </div>

            <div>
                <h3>Aluno(s) com Maior Média (<?= number_format($maiorMedia, 2) ?>)</h3>
                <?php 
                foreach ($alunosMaiores as $i) {
                    echo "Matrícula: " . $_SESSION['matriculas'][$i] . "<br>";
                    echo "Nome: " . $_SESSION['nomes'][$i] . "<br><br>";
                } ?>
            </div>

            <div>
                <h3>Aluno(s) com Menor Média (<?= number_format($menorMedia, 2) ?>)</h3>
                <?php 
                foreach ($alunosMenores as $i) {
                    echo "Matrícula: " . $_SESSION['matriculas'][$i] . "<br>";
                    echo "Nome: " . $_SESSION['nomes'][$i] . "<br><br>";
                } ?>
            </div>

            <div>
                <h3>Alunos Cadastrados</h3>
                <?= COUNT($_SESSION['matriculas']) ?>
            </div>

        </div>

    <?php else: ?>
        Nenhum Aluno Cadastrado.
    <?php endif; ?>

    </div>

    <?php endif; ?>

</body>
</html>