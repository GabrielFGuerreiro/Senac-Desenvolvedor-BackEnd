<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
</head>
<body>
    <form action="" method="post">
        <label for="mesInput">Digite um número</label>
        <input type="text" id="mesInput" name="mesInput" min="1" max="12">
        <button>Enviar</button>
    </form>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $mes = $_POST["mesInput"];
        switch ($mes) {

            case '1':
                echo "Janeiro";
                break;

            case '2':
                echo "Fevereiro";
                break;

            case '3':
                echo "Março";
                break;

            case '4':
                echo "Abril";
                break;

            case '5':
                echo "Maio";
                break;

            case '6':
                echo "Junho";
                break;

            case '7':
                echo "Julho";
                break;

            case '8':
                echo "Agosto";
                break;

            case '9':
                echo "Setembro";
                break;

            case '10':
                echo "Outubro";
                break;

            case '11':
                echo "Novembro";
                break;

            case '12':
                echo "Dezembro";
                break;

            default:
                echo "Não existe um mês com esse número.";
                break;
        }   
    }

?>