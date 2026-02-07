<!-- Faça um formulário que receba um número N. Utilize do...while para calcular e exibir o fatorial de N. -->

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 4</title>
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
    $resultado = $numero;
    if($numero != 1) {
        $numero--;
        do {    
            $resultado = $resultado * $numero;
            $numero--;
        } while ($numero >= 1);    
    }
    echo "O fatorial de " . $_POST["numInput"] . " é: " . $resultado;
}
?>