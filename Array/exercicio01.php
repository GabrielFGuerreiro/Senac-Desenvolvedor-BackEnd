<!-- 1) Desenvolva em php um array com 10 valores, preencha no próprio código as 10 posições. Depois calcule e mostre a soma e a média desses valores. -->

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

$media = $total/4;
echo "Média das valores: " . $media . "<br>";
?>