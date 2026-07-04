<?php
// Inclui a classe ContaPoupanca
include_once 'ContaPoupanca.php';
 
// Cria uma instância de ContaPoupanca
$contaPoupanca = new ContaPoupanca();
 
// Verifica se foi enviado um valor de depósito
if (isset($_POST['depositar'])) {
    $quantia = floatval($_POST['quantia']);
    $contaPoupanca->depositar($quantia);
}
 
// Verifica se o usuário clicou para aplicar os juros
if (isset($_POST['aplicarJuros'])) {
    $contaPoupanca->aplicarJuros();
}
?>
 
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Poupança</title>
    <link rel="stylesheet" href="css/estiloCC.css">
</head>
<body>
 
<header>
    <h1>Detalhes da Conta Poupança</h1>
</header>
 
<nav>
    <a href="index.php">Início</a>
    <a href="conta_corrente.php">Conta Corrente</a>
</nav>
 
<div class="container">
    <?php
    // Exibe o saldo atual
    $contaPoupanca->getSaldo();
    ?>
 
    <!-- Formulário para depósito -->
     <?php
    echo "O saldo atual da conta é: R$" . number_format($contaPoupanca->getSaldo(), 2, ',', '.') . "<br>";
    ?>
    <form method="post">
        <label for="quantia">Depósito:</label>
        <input type="number" step="0.01" name="quantia" id="quantia" required>
        <input type="submit" name="depositar" value="Depositar">
    </form>
 
    <!-- Formulário para aplicar juros -->
    <form method="post">
        <input type="submit" name="aplicarJuros" value="Aplicar Juros">
    </form>
</div>
 
</body>
</html>
 
 