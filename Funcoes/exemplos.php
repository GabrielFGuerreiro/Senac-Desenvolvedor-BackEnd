<?php

function mensagem()
{
    echo "Seja Bem Vindo!";
}
mensagem();

function comParametro($nome)
{
    echo "Olá, $nome! Seja bem-vindo!";
}
comParametro("Gabriel");

function soma($a, $b)
{
    return $a + $b;
}
$resultado = soma(5, 3);
echo $resultado;

function horaAtual()
{
    return date("H:i:s");
}
echo "A hora atual é: " . horaAtual();
?>