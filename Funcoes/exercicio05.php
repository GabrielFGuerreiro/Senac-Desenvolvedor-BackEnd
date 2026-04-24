<!-- Crie uma função que receba uma string e retorne essa string invertida, sem utilizar funções prontas do PHP para inversão. -->
<?php
function inverteString($texto)
{
    $textoInvertido = "";
    for($i = strlen($texto)-1; $i >= 0; $i--)
    {
        $textoInvertido .= $texto[$i];
    }
    return $textoInvertido;
}
echo inverteString("gabriel");
?>
