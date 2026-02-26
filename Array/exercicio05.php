<!-- 5) Desenvolva em php um array com 7 elementos numéricos e verificar se existe número igual a 30. Se existirem, escrever a posição em que está armazenado. (Imaginando não ter números repetidos). Preencha no próprio código as 7 posições. -->

<?php
$nums = [];

$nums[0] = 67;
$nums[1] = 7;
$nums[2] = 21;
$nums[3] = 100;  
$nums[4] = 30;
$nums[5] = 1;  
$nums[6] = 180;

for ($i = 0; $i < 7; $i++) {
    if($nums[$i] = 30)
    {
        echo "Índice do elemento que possui valor 30: " . $i;        
    }
}

?>