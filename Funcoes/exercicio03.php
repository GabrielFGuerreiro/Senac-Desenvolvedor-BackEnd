<!-- Crie uma função que receba um número inteiro e retorne se ele é par ou ímpar. -->

<?php
function ehImparOuPar($num)
{
    if($num % 2 == 0)
        return "Par";
    else
        return "Ímpar";
}
echo "O número 10 é: " . ehImparOuPar(10);
?>