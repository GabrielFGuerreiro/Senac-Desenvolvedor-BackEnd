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
        <label for="nomeBusca">Nome:</label>
        <input type="text" name="nomeBusca">
        <button>Buscar</button>
        <a href="index.php"><button type="button">Voltar</button></a>
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    echo "<div id='container'>";

    if(!empty($_SESSION['nomes']))
    {
        $nomeBusca = $_POST['nomeBusca'];
        $indexAlunos = [];
        if(!empty($nomeBusca))
        {
            for ($i=0; $i < 10; $i++) { 
                if(str_contains(strtoupper($_SESSION['nomes'][$i]), strtoupper($nomeBusca)))    
                    $indexAlunos[] = $i; //Pega os índices dos alunos que correspondem a busca.                
            }
                
            if($indexAlunos == [])
            {
                echo "Aluno Não Encontrado.";
                echo "</div>";
                exit();
            } 
        }
        else {
            $indexAlunos = range(0, 9);
        }

        echo "<table border='1'><tr>";
        echo "<th>Nome</th>";
        echo "<th>Idade</th>";
        echo "<th>Curso</th>";
        echo "<th>Nota</th></tr>";
        foreach ($indexAlunos as $i) {
            if(!empty($_SESSION['nomes'][$i]))
            {    
                echo "<tr><td>" . $_SESSION['nomes'][$i] . "</td>";
                echo "<td>" . $_SESSION['idades'][$i]. "</td>";
                echo "<td>" . $_SESSION['cursos'][$i] . "</td>";
                echo "<td>" . $_SESSION['notas'][$i] . "</td></tr>";
                //echo $_SESSION['nomes'][$i]['nome']; //Usando array associativo
            }
        }
        echo "</table>";
    }
    else {
        echo "Alunos Não Cadastrados.";
    }
    echo "</div>";
}
?>