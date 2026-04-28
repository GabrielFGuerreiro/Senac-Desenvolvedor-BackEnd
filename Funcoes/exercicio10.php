<!-- 10. Crie uma função em PHP chamada gerarToken() que gere um token aleatório para ser utilizado em sistemas de login, recuperação de senha ou confirmação de cadastro.
A função deve:

gerar uma sequência aleatória de caracteres;
permitir definir o tamanho do token;
retornar o token gerado;
exibir o token na tela.
Ex.: A7x9Kp2LmQ -->

<?php
function gerarToken($tamToken)
{
    $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $token = "";

    for ($i = 0; $i < $tamToken; $i++) {
        $token .= $caracteres[random_int(0, strlen($caracteres) - 1)]; //Índice aleatório usando random_int. Pode retornar o primeiro caractere (índice 0, letra "a" ) até o último caractere (strLen, número "9").
    }
    return $token;    
}
echo gerarToken(10);
?>


