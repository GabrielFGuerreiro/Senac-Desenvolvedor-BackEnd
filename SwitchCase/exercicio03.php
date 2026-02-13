<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3</title>
</head>
<body>
    <form action="" method="post">
        <label for="vlCompraInput">Digite o valor da compra</label>
        <input type="text" id="vlCompraInput" name="vlCompraInput">

        <label for="formPagInput">Digite a forma de pagamento</label>
        <input type="text" id="formPagInput" name="formPagInput">

        <label class="parcelas" valur="aaa" for="qntParcelasInput">Digite em quantas parcelas deseja pagar</label>
        <input class="parcelas" type="number" id="qntParcelasInput" name="qntParcelasInput">
        <button>Enviar</button>
    </form>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $vlCompra = $_POST["vlCompraInput"];
        $formPag = $_POST["formPagInput"];

        switch ($formPag) {
            case '1':
                echo "Valor da compra com desconto de 5%: " . $vlCompra * 0.95;
                break;

            case '2':
                echo "Valor da compra com juros de 5%: " . $vlCompra * 1.05;
                break;

            case '3':
                echo "Três/Three";
                break;

            default:
                echo "Não existe a opção desejada.";
                break;
        }   
    }

?>
<script>
    var formPagEl = document.getElementById("formPagInput");
    formPagEl.addEventListener("change", () =>
    {
        if(formPagEl.value == 3)
        {
            document.getElementsByClassName("parcelas");

        }
    });
</script>