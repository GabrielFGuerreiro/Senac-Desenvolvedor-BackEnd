<!-- 2) Desenvolva em php um array com 10 posições e exiba no final a soma de todos os números existentes. Preencha no próprio código as 10 posições. -->

<?php
$valores = [];

$valores[0] = 4.0;
$valores[1] = 5.5;
$valores[2] = 6.5;
$valores[3] = 6.0;  
$valores[4] = 8.4;
$valores[5] = 1.8;
$valores[6] = 7.2;    
$valores[7] = 2.5;    
$valores[8] = 1.4;    
$valores[9] = 8.4;

$total = $valores[0] + $valores[1] + $valores[2] + $valores[3] + $valores[4];
echo "Total de valores: " . $total . "<br>";

?>