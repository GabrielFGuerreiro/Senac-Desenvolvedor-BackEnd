<!-- Crie uma função que receba três números como parâmetros e retorne o maior valor entre eles. -->
<?php
function saudacao($num1, $num2, $num3)
{
    return max($num1, $num2, $num3);
}
echo saudacao(5, 10, 3);
?>