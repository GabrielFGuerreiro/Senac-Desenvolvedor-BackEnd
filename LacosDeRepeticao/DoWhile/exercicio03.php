<!-- Faça um formulário que solicite um número inteiro N.Utilizando do...while, exiba a contagem regressiva de N até 0. -->

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3</title>
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
    
    do {
        echo $numero."<br>";

        $numero--;           

    } while ($numero >= 0);
}
?>