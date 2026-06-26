<?php
require_once 'Produto.php';
$produto = null;

if(isset($_POST['cadastrar'])) {
    $produto = new Produto($_POST['codigo'], $_POST['nome'], $_POST['preco'], $_POST['quantidade']);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
</head>
<body>
 
    <h1>Cadastro de Produto</h1>
 
    <form method="POST">
 
        Código:<br>
        <input type="number" name="codigo" required>
        <br><br>
 
        Nome:<br>
        <input type="text" name="nome" required>
        <br><br>
 
        Preço:<br>
        <input type="number" step="0.01" name="preco" required>
        <br><br>
 
        Quantidade:<br>
        <input type="number" name="quantidade" required>
        <br><br>
 
        <input type="submit" name="cadastrar" value="Cadastrar">
 
    </form>
 
    <hr>
    <?php
    if($produto != null) {
        $produto->exibirProduto();
        

    }
    ?>
 
 
</body>
</html>
 