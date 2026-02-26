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
        <input type="number" id="vlCompraInput" name="vlCompraInput" min="1"><br>

        <label for="formPagInput">Digite a forma de pagamento
            (1 – Dinheiro, 2 – Cheque, 3 – Cartão)
        </label><br>
        <input type="number" id="formPagInput" name="formPagInput" min="1"><br>

        <div id="dtPrevista" style="display: none;">
            <label for="dtPrevista">Digite a data prevista</label>
            <input type="date" id="dtPrevista" name="dtPrevista">
        </div>

        <div id="parcelas" style="display: none;">
            <label for="qntParcelasInput">Digite em quantas parcelas deseja pagar</label>
            <input type="number" id="qntParcelasInput" name="qntParcelasInput" min="1">
        </div>
        <button>Enviar</button>
    </form>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $vlCompra = $_POST["vlCompraInput"];
        $formPag = $_POST["formPagInput"];
        
        echo "Valor da compra com ";
        switch ($formPag) {
            case '1':
                echo "desconto de 5%: " . $vlCompra * 0.95;
                break;

            case '2':
                echo "juros de 5%: " . $vlCompra * 1.05;
                break;

            case '3':
                echo "juros de 7%: " . $vlCompra * 1.07;
                if(!empty($_POST["qntParcelasInput"]))
                {
                    echo "Valor das parcelas: " . (($vlCompra * 1.07) / $_POST["qntParcelasInput"]);
                }
                break;

            default:
                echo "Não existe a opção desejada.";
                break;
        }   
    }

?>
<script>
    var formPagEl = document.getElementById("formPagInput");
    formPagEl.addEventListener("input", () =>
    {
        var parcelas = document.getElementById("parcelas");
        var dtPrevista = document.getElementById("dtPrevista");
        parcelas.style.display = "none";        
        dtPrevista.style.display = "none";
        if(formPagEl.value == 3 && document.getElementById("vlCompraInput").value >= 100)
            parcelas.style.display = "block";        
        else if(formPagEl.value == 2)
            dtPrevista.style.display = "block";
    });
</script>