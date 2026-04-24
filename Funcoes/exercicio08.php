<!-- Crie uma função que receba o valor de um produto e retorne o valor do frete:
até R$100 → R$20
até R$300 → R$15
acima disso → frete grátis -->
<?php
function calcularFrete($valorProduto)
{
    if($valorProduto > 300)
        return "Frete grátis";
    else if ($valorProduto <= 100)
        return "R$20";
    else
        return "R$15";
}

echo calcularFrete(301);
?>
