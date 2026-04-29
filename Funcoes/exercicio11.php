<!-- Desenvolver uma função onde o usuário deve informar um número e a função deve verificar se ele é divisível por 10, por 5, por 2 ou se não é divisível por nenhum destes. -->

<?php
function VerificarDivisores($num)
{
    (string)$mensagem = "";
    if($num % 10 == 0)
        $mensagem = "10 ";

    if($num % 5 == 0)
        $mensagem .= " 5 ";

    if($num % 2 == 0)
        $mensagem .= " 2";

    return !empty($mensagem)
        ? "Dividido por:" . str_replace("  ", ", ", $mensagem)
        : "Não é divido por 10, 5 ou 2";
}

echo VerificarDivisores(30);


?>