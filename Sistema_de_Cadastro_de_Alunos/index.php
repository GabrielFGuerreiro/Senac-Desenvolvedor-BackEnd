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
    <title>Sistema de Cadastro de Alunos</title>
</head>
<body>
    <div id="container">
        <h1>Cadastro do <span>1</span>º Aluno</h1>
        <input id="alunoAtual" type="hidden" value="0">
        <form action="index.php" method="post" id="form"><?php
            for($i = 0; $i < $qntAlunos; $i++) {?>
                <div id="dadosAluno_<?=$i?>" style="">
                    <label for="nmAluno">Nome<?=$i?>:</label>
                    <input type="text" id="nmAluno_<?=$i?>" name="nmAluno" ><br>
                    
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
    
    // array_push($nome, $_POST['nmAluno']);
    // $curso = $_POST['cursoAluno'];
    // $nota = $_POST['notaAluno']; 
  
    for ($i=0; $i < $qntAlunos; $i++) { 
        $idade[$i] = $_POST["idadeAluno_$i"];
    echo $idade[$i];
    } 
    }

  ?>

<script>
    var form = document.getElementById("form");
    function MostraCamposAlunoAtual()
    {
        var alunoAtual = document.getElementById("alunoAtual");
        
        var formAluno = document.getElementById("container");
        var campos = formAluno.querySelectorAll("div");
        
        for (let i = 0; i < campos.length; i++) {
            if(alunoAtual.value != i)
                campos[i].style.display = "none";
            else
                campos[i].style.display = "inline-block";           
        }
        console.log(alunoAtual.value);
        if((parseInt(alunoAtual.value))  == 9)
            form.submit();
        alunoAtual.value = alunoAtual.value == "9" ? "9" : parseInt(alunoAtual.value) + 1;
    }

    document.getElementById("botaoSubmit").addEventListener(
        "click",
        MostraCamposAlunoAtual
    );
    form.addEventListener("submit", e =>{e.preventDefault();})
    MostraCamposAlunoAtual();
</script>

