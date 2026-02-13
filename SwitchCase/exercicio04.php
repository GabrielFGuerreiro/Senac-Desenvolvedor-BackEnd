<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 4</title>
</head>
<body>
    <form action="" method="post">
        <label for="salarioInput">Digite seu salário</label>
        <input type="text" id="formPagInput" name="salarioInput">
        <button>Enviar</button>
    </form>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $salario = $_POST["salarioInput"];
        $faixaSalarial = 0;

        if($salario <= 800)
            $faixaSalarial = 1;
        else if($salario <= 1500)
            $faixaSalarial = 2;
        else if($salario <= 2300)
            $faixaSalarial = 3;
        else if($salario <= 3500)
            $faixaSalarial = 4;
        else
            $faixaSalarial = 5;

        echo "Cálculo da Participação nos Lucros da Empresa.<br>Valor da PLR: ";
        switch ($faixaSalarial) {
            case '1':
                echo ($salario * 0.07) + 500;
                break;

            case '2':
                echo ($salario * 0.10) + 800;
                break;

            case '3':
                echo ($salario * 0.12) + 1000;
                break;

            case '4':
                echo ($salario * 0.15) + 1200;
                break;

            case '5':
                echo 1200;
                break;
        }
    }

?>