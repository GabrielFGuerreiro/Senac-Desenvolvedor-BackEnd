<?php
include_once 'ContaCorrente.php';
$contaCorrente = new ContaCorrente();

//Verifica se o usuário enviou um valor de depósito
if(isset($_POST['depositar']))
{
    $quantidade = floatval($_POST['quantia']);
    $contaCorrente->Depositar($quantidade);
    echo "Depósito de R$$quantidade reais realizado com sucesso.<br>";
}

//Verificar se o usuário enviou um valor de saque
if(isset($_POST['sacar']))
{
    $quantidade = floatval($_POST['quantia']);
    $contaCorrente->Sacar($quantidade);
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Corrente</title>
    <link rel="stylesheet" href="css/estiloCC.css">
</head>
<body>
 
<header>
    <h1>Detalhes da Conta Corrente</h1>
</header>
 
<nav>
    <a href="index.php">Início</a>
    <a href="conta_poupanca.php">Poupança</a>
</nav>
 
<div class="container">
    <?php
    // Exibe o saldo atual
    echo "O saldo atual da conta é: R$" . number_format($contaCorrente->getSaldo(), 2, ',', '.') . "<br>";
    // Exibe o limite atual
    echo "O limite atual da conta é: R$" . number_format($contaCorrente->getLimite(), 2, ',', '.') . "<br>";
    ?>
 
    <!-- Formulário para depósito -->
    <form method="post">
        <label for="quantia">Depósito:</label>
        <input type="number" step="0.01" name="quantia" id="quantia" required>
        <input type="submit" name="depositar" value="Depositar">
    </form>
 
    <!-- Formulário para saque -->
    <form method="post">
        <label for="quantia">Saque:</label>
        <input type="number" step="0.01" name="quantia" id="quantia" required>
        <input type="submit" name="sacar" value="Sacar">
    </form>
    
</div>
 
</body>
</html>
 