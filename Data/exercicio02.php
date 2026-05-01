<!-- 2. Crie uma página em php onde o usuário insere a data de nascimento e mostre quantos anos, meses e dias a pessoa tem. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nascimento</title>
</head>
<body>
    <form action="" method="post">
        <label for="dataNascimento">Digite sua data de nascimento:</label>
        <input type="date" name="dataNascimento">
        <button>Enviar</button>
    </form>
</body>
</html>

<?php
$dataNascimento = $_POST['dataNascimento'];
$dataAtual = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));

$diferenca = $dataAtual->getTimestamp()  - strtotime($dataNascimento);
$anos = floor($diferenca / (60 * 60 * 24 * 365));
$meses = floor($diferenca / (60 * 60 * 24 * 30));
$dias = floor($diferenca / (60 * 60 * 24));
echo "Idade: " . $anos . " anos, " . $meses . " meses e " . $dias . " dias.";

?>