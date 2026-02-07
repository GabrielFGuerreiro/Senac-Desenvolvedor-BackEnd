<!-- 1. Leia um número e mostre sua tabuada até 10. -->

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1</title>
</head>
<body>
    <form action="" method="post">
        <label for="numInput">Digite um número</label>
        <input type="number" id="numInput" name="numInput" min="1">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numInput"];
    
    $i = 1;
    do {
        echo $numero . " x ". $i . " = " .$numero * $i . "<br>";
        $i++;
    } while ($i <= 10);        
}
?>