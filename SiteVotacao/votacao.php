<?php
session_start();
    $turmas = file("turmas.txt");
    $alunosArray = file("alunos.txt");
    $login = $_SESSION['entryEmail'];

    $emailArray = file("_jaVotou.txt");
    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Votação!!</title>
</head>
<body>
    <div class="container">
        <!-- Formulário para selecionar a TURMA --><?php 
        if(empty($_POST['turmaAluno'])) { ?>
            <form id="formVotacao" action="votacao.php" method="post">
                <label for="formVotacao">Escolha a turma</label>
                <select name="turmaAluno" id="turmaAluno" required>
                    <option value="">Selecione...</option><?php
                    foreach ($turmas as $turma): ?>
                        <option value="<?= $turma ?>"><?= $turma ?></option><?php
                    endforeach; ?>
                </select>

                <button type="submit" value="turmaAluno">Confirmar Seleção</button>
                <a class="botao-lista principal" href="menu.php">Voltar para o Menu</a>
            </form><?php
        } ?>
            
        <!-- Formulário para selecionar o ALUNO --><?php 
        if(!empty($_POST['turmaAluno'])) { ?>
            <form method="post">
                <label for="aluno">Escolha seu voto para Representante</label>
                <select name="aluno" id="aluno" required>
                    <option value="">Selecione...</option><?php 
                    
                    foreach ($alunosArray as $alunoLinha):
                        $alunoDados = explode(' | ', $alunoLinha);
                        $turmaSelect = $_POST['turmaAluno'];

                        if(trim($alunoDados[2]) == trim($turmaSelect)): ?>
                            <option value="<?= $alunoDados[1] ?>"> <?= $alunoDados[0] ?> </option><?php
                        endif; ?><?php                         
                    endforeach; ?>
                </select>
                <button type="submit" value="aluno">Confirmar Voto</button>
                <a class="botao-lista principal" href="votacao.php">Trocar Turma</a>
            </form><?php 
        } ?>

    </div>
</body>
</html>

<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST['aluno'])) {
            $icJaVotou = false;
            foreach ($emailArray as $email) {
                if(trim($email) == trim($login))
                {
                    $icJaVotou = true;   
                }
            }

            if (!$icJaVotou) {
                $raAluno = $_POST["aluno"];
                file_put_contents( "votos.txt", $raAluno.PHP_EOL, FILE_APPEND );
                file_put_contents("_jaVotou.txt",$login.PHP_EOL, FILE_APPEND);
                header('Location: resultados.php'); 
            }
            else {
                echo "Não é permitido votar novamente.";
                
            }
        }
    }
?>
