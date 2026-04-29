<?php
//Na usina de Angra dos Reis, os técnicos analisam a perda de massa de um material radioativo. Sabendo-se que este perde 25% de sua massa a cada 30 segundos, criar uma função que imprima o tempo necessário para que a massa desse material seja menor que 0.10.

function CalcularTempoPerdaMassa($massaMaterial)
{
    $tempo = 0;
    while($massaMaterial >= 0.10)
    {
        $massaMaterial = $massaMaterial * 0.75;
        $tempo += 30;
    }
    return $tempo;
}

echo CalcularTempoPerdaMassa(0.5) . " segundo(s)";

?>