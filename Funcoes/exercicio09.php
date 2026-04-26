<!-- 9.Crie uma função que receba uma senha e verifique se ela atende aos critérios:

mínimo 8 caracteres
possui número
possui letra maiúscula -->

<?php
function validarSenha($senha)
{
    $temNumero = false;
    $temMaiuscula = false;
    for($i = 0; $i < strlen($senha); $i++)
    {
        if(ctype_digit($senha[$i]))
            $temNumero = true;

        if(ctype_upper($senha[$i]))
            $temMaiuscula = true;
    }

    if(strlen($senha) >= 8 && $temNumero && $temMaiuscula)    
        return "Senha válida";    
    else    
        return "Senha inválida";    
}

echo validarSenha("1234AbCd");
?>


