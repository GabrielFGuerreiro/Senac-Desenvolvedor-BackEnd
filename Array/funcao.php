<?php

$numeros = [1,2,3,4];
$array2 = array(7,8,9);

array_push($numeros, 5, 6); //Adiciona elementos no final do array
array_pop($numeros); //Remove elementos
array_unshift($numeros, 0, -1); //Coloca elementos no começo do array

$numeros = array_slice($numeros, 3,3); //Recorta os elementos com base no índice e na qnt dos elementos

sort($numeros); //Orderna o array de forma crescente
rsort($numeros); //Orderna o array de forma descrescente
for($i = 0; $i < count($numeros); $i++)
{
    echo $numeros[$i] ."<br>";
}
?>