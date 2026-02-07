<!-- Crie um formulário que receba um número N.Usando do...while, gere e exiba os primeiros N termos da sequência de Fibonacci. -->

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 5</title>
</head>
<body>
    <form action="" method="post">
        <label for="numInput">Digite um número</label>
        <input type="number" id="numInput" name="numInput" min="0">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numInput"];
    $numAntes = $numero;
    $i = 1;
    do {
        echo $i . "º número: " . $numero . "<br>";
        $numero = $numAntes + $numero;         
        $numAntes = $numero - $numAntes;
        $i++;
    } while ($i <= $_POST["numInput"]);    
}
?>