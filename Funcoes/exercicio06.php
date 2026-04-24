<!-- Crie uma função que receba o valor de uma compra e aplique descontos conforme a regra: acima de R$ 100,00 recebe 10%; acima de R$ 300,00 recebe 15%; acima de R$ 500,00 recebe 20%. -->

<?php
function aplicaDesconto($valorCompra)
{
    if($valorCompra > 500)
        $valorCompra = $valorCompra * 0.80;
    else if($valorCompra > 300)
        $valorCompra = $valorCompra * 0.85;
    else if($valorCompra > 100)
        $valorCompra = $valorCompra * 0.90;   

    return $valorCompra;
}
echo aplicaDesconto(200);
?>
