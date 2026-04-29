<?php
//Desenvolver uma função que leia 3 números, os possíveis lados de um triângulo, e imprimir a classificação de acordo com tamanho dos lados.

function ClassificarTriangulo($lado1, $lado2, $lado3)
{
    if($lado1 == $lado2 && $lado1 == $lado3)
        return "Equilátero";
    else if($lado1 != $lado2 && $lado2 != $lado3 && $lado1 != $lado3)
        return "Escaleno";
    else
        return "Isóceles";
}

echo ClassificarTriangulo(5,1,5);

?>