<?php
// Desenvolva uma função calcularIMC($peso, $altura) que receba o peso (kg) e a altura (m). A função deve calcular e retornar o valor do IMC (IMC= Peso/altura). Use a função para exibir o resultado de uma pessoa com 80KG e 1.80m.


function CalcularIMC($peso, $altura)
{
    return $peso / $altura;
}

echo CalcularIMC(80, 1.80);
?>