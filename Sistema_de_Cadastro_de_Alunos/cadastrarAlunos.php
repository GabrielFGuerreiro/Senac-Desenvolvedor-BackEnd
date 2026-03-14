<?php
$qntAlunos = 10;

session_start();
$_SESSION["nomes"] = [];
$_SESSION["idades"] = [];
$_SESSION["cursos"] = [];
$_SESSION["notas"] = [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>    
    <div class="container">
        <h1>Cadastro do <span>0</span>º Aluno</h1>
        <form action="" method="post" id="form"><?php
            for($i = 0; $i < $qntAlunos; $i++) {?>
                <div id="dadosAluno_<?=$i?>" style="">
                    <label for="nmAluno">Nome:</label>
                    <input type="text" id="nmAluno_<?=$i?>" name="nmAluno_<?=$i?>" required>
                    
                    <label for="idadeAluno">Idade:</label>
                    <input type="number" id="idadeAluno_<?=$i?>" name="idadeAluno_<?=$i?>" min="1" required>
                    
                    <label for="cursoAluno">Curso:</label>
                    <input type="text" id="cursoAluno_<?=$i?>" name="cursoAluno_<?=$i?>" required>
                    
                    <label for="notaAluno">Nota Final:</label>
                    <input type="number" id="notaAluno_<?=$i?>" name="notaAluno_<?=$i?>" min="0" max="10" required>
                </div><?php            
            }?>
            <button id="botaoSubmit" type="submit">Cadastrar</button>
            <a href="index.php" class="btnVoltar">Voltar</a>
        </form>
    </div>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    for ($i = 0; $i < $qntAlunos; $i++) { 
        array_push($_SESSION["nomes"], $_POST["nmAluno_$i"]);
        array_push($_SESSION["idades"], $_POST["idadeAluno_$i"]);
        array_push($_SESSION["cursos"], $_POST["cursoAluno_$i"]);
        array_push($_SESSION["notas"], $_POST["notaAluno_$i"]);

        // $_SESSION["nomes"][$i] = [ //Usando array associativo
        //     'nome' => $_POST["nmAluno_$i"]
        // ];

        // $_SESSION["idades"] = [
        //     'idade' => $_POST["idadeAluno_$i"]
        // ];

        // $_SESSION["cursos"] = [
        //     'curso' => $_POST["cursoAluno_$i"]
        // ];

        // $_SESSION["notas"] = [
        //     'nota' => $_POST["notaAluno_$i"]
        // ];
    } 
    echo "<div id='container'><h1>Alunos Cadastrados com Sucesso!</h1></div>";
}

?>

<script>
    var form = document.getElementById("form");
    function MostraCamposAlunoAtual()
    {        
        var container = document.querySelector(".container");
        var alunoAtual = container.querySelector("span").innerHTML;

        for (let i = 0; i < 10; i++) {
            var camposAluno = document.getElementById(`dadosAluno_${i}`);
            if(alunoAtual != i)
                camposAluno.style.display = "none";
            else
                camposAluno.style.display = "inline-block";           
        }

        if((parseInt(alunoAtual)) == 10)
        {
            form.submit();
        }

        container.querySelector("span").innerHTML = alunoAtual == "10"
                                                    ? "10"
                                                    : parseInt(alunoAtual) + 1;
    }

    document.getElementById("botaoSubmit").addEventListener(
        "click",
        MostraCamposAlunoAtual
    );
    form.addEventListener("submit", e =>{e.preventDefault();})
    MostraCamposAlunoAtual();
</script>

