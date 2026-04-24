<!-- 10. Crie uma função em PHP chamada gerarToken() que gere um token aleatório para ser utilizado em sistemas de login, recuperação de senha ou confirmação de cadastro.
A função deve:

gerar uma sequência aleatória de caracteres;
permitir definir o tamanho do token;
retornar o token gerado;
exibir o token na tela.
Ex.: A7x9Kp2LmQ -->


<?php
function gerarToken($senha)
{
    if(strlen(($senha) >= 8 ))    
        return "Senha válida";    
    else    
        return "Senha inválida";
    
}
echo gerarToken("12345Abc")
?>


