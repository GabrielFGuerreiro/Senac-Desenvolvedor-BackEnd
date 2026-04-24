<!-- Crie uma função que receba nome e sobrenome e gere um login no formato:
primeironome.sobrenome -->
<?php

function gerarLogin($nome, $sobrenome)
{
    return $nome . "." . $sobrenome;
}
echo gerarLogin("gabriel", "guerreiro");
?>