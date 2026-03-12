<?php
$qntAlunos = 10;

$nomes = array_fill(0, $qntAlunos, "");
$idades = array_fill(0, $qntAlunos, "");
$cursos = array_fill(0, $qntAlunos, "");
$notas = array_fill(0, $qntAlunos, "");

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
    <div id="container">
        <h1>Cadastro do <span>0</span>º Aluno</h1>
        <!-- <input id="alunoAtual" type="hidden" value="0"> -->
        <form action="index.php" method="post" id="form"><?php
            for($i = 0; $i < $qntAlunos; $i++) {?>
                <div id="dadosAluno_<?=$i?>" style="">
                    <label for="nmAluno">Nome<?=$i?>:</label>
                    <input type="text" id="nmAluno_<?=$i?>" name="nmAluno_<?=$i?>" ><br>
                    
                    <label for="idadeAluno">Idade:</label>
                    <input type="number" id="idadeAluno_<?=$i?>" name="idadeAluno_<?=$i?>" min="1" ><br>
                    
                    <label for="cursoAluno">Curso:</label>
                    <input type="text" id="cursoAluno_<?=$i?>" name="cursoAluno_<?=$i?>" ><br>
                    
                    <label for="notaAluno">Nota Final:</label>
                    <input type="number" id="notaAluno_<?=$i?>" name="notaAluno_<?=$i?>" min="0" ><br>  <br>                   
                </div><?php            
            }?>
            <button id="botaoSubmit" type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

    for ($i = 0; $i < $qntAlunos; $i++) { 
        $nomes[$i] = $_POST["nmAluno_$i"];
        $idade[$i] = $_POST["idadeAluno_$i"];
        $cursos[$i] = $_POST["cursoAluno_$i"];
        $notas[$i] = $_POST["notaAluno_$i"];
    } 
}

?>

<script>
    var form = document.getElementById("form");
    function MostraCamposAlunoAtual()
    {        
        var container = document.getElementById("container");
        var alunoAtual = container.querySelector("span").innerHTML;

        for (let i = 0; i < 10; i++) {
            var camposAluno = document.getElementById(`dadosAluno_${i}`);
            if(alunoAtual != i)
                camposAluno.style.display = "none";
            else
                camposAluno.style.display = "inline-block";           
        }

        if((parseInt(alunoAtual)) == 10)
            form.submit();

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

