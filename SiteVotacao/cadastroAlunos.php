<?php
    $turmas = file("turmas.txt");    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar Alunos</title>
</head>
<body>
    <form action="" method="post">
        <label for="nomeAluno">Digite o seu nome: </label>
        <input id="nomeAluno" name="nomeAluno" type="text" required>

        <label for="raAluno">Digite o seu RA</span>: </label>
        <input id="raAluno" name="raAluno" type="text" required>

        <label for="turmaAluno">Escolha a sua turma: </label>
        <select name="turmaAluno" id="turmaAluno" required>
            <option value="">Selecione...</option><?php
            foreach ($turmas as $turma): ?>
                <option value="<?= $turma ?>"><?= $turma ?></option><?php
            endforeach;?>
        </select>
        
        <button>Cadastrar</button>

        <a class="botao-lista principal" href="menu.php">Voltar</a>
    </form>
    
</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeAluno = $_POST['nomeAluno'];
    $raAluno = $_POST['raAluno'];
    $turmaAluno = $_POST['turmaAluno'];
    $msg = "";
    $icJaCadastrado = false;

    $alunosArray = file("alunos.txt");
    foreach ($alunosArray as $alunoLinha) {
        $alunoDados = explode(" | ", $alunoLinha);
        if(trim($alunoDados[1]) == $raAluno) {
            $icJaCadastrado = true;
        }
    }
    
    if($icJaCadastrado == true)
        $msg = "Aluno já cadastrado.";
    else
    {
        file_put_contents("alunos.txt",($nomeAluno . " | " . $raAluno . " | " . $turmaAluno), FILE_APPEND); //"./Aula27-Jan/alunos.txt"
        $msg = "Cadastro realizado com sucesso!";
    }

    echo $msg;
    exit();
}
?>
