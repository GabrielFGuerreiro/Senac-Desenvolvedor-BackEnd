<!-- Crie uma página com um formulário em HTML que receba um número inteiro N. Em PHP, use um laço do...while para exibir todos os números de 1 até N. -->

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
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
    $i = 1;
    do {
        echo $i."<br>";

        $i++;           

    } while ($i <= $numero);
    
}
?>