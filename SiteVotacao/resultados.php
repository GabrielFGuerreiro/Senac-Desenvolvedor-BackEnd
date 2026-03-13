<?php
    $votos = file_get_contents("votos.txt");
    $alunosArray = file("alunos.txt");
?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>
<body>    
    <div class="container">
        <table>
            <tr>
                <th>Aluno</th>
                <th>Turma</th>
                <th>Votos</th>
            </tr><?php
            foreach ($alunosArray as $alunoLinha): ?>
                <tr><?php
                    $alunoDados = explode(' | ', $alunoLinha);
                    $qntVotos = substr_count($votos, $alunoDados[1]);?>
                    <td> <?= $alunoDados[0] ?> </td>
                    <td> <?= $alunoDados[2] ?> </td>
                    <td> <?= $qntVotos ?> </td>
                </tr> <?php
            endforeach;?>
        </table>
        <a class="botao-lista principal" href="menu.php">Voltar</a>
    </div>
</body>
</html>
