<!-- 3) Desenvolva em php um array com 5 posições e determine e exiba o MAIOR valor encontrado. Preencha no próprio código as 5 posições. -->

<?php
$valores = [];

$valores[0] = 4.0;
$valores[1] = 5.5;
$valores[2] = 6.5;
$valores[3] = 6.0;  
$valores[4] = 8.4;

echo "Valor máximo " . max($valores);
?>