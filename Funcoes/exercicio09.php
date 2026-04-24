<!-- 9.Crie uma função que receba uma senha e verifique se ela atende aos critérios:

mínimo 8 caracteres
possui número
possui letra maiúscula -->

<?php
function validarSenha($senha)
{
    if(strlen(($senha) >= 8 ))    
        return "Senha válida";    
    else    
        return "Senha inválida";
    
}
validarSenha("12345Abc")
?>


