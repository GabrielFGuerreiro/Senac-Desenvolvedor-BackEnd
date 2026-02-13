<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1</title>
</head>
<body>
    <form action="" method="post">
        <label for="numInput">Digite um número</label>
        <input type="text" id="numInput" name="numInput">
        <button>Enviar</button>
    </form>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $num = $_POST["numInput"];
        switch ($num) {
            case '0':
                echo "Zero";
                break;

            case '1':
                echo "Um/One";
                break;

            case '2':
                echo "Dois/Two";
                break;

            case '3':
                echo "Três/Three";
                break;

            case '4':
                echo "Quatro/Four";
                break;

            case '5':
                echo "Cinco/Five";
                break;

            default:
                echo "Não existe a opção desejada.";
                break;
        }   
    }

?>