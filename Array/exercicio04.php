<!-- 4) Desenvolva em php um array com 5 nomes, e que exiba a lista desses nomes na tela. Após exibir essa lista, o programa deve mostrar também os nomes na ordem inversa em que o usuário os digitou, um por linha. Preencha no próprio código as 5 posições. -->

<?php
$nomes = [];

$nomes[0] = "Gabriel";
$nomes[1] = "Rodrigo";
$nomes[2] = "Walter";
$nomes[3] = "Bárbara";  
$nomes[4] = "Bianka";

echo "Lista dos nomes: <br>" . $nomes[0] . "<br>" . $nomes[1] ."<br>". $nomes[2] ."<br>". $nomes[3] ."<br>". $nomes[4] . "<br><br>";


echo "Lista inversa: <br>" . $nomes[4] . "<br>" . $nomes[3] ."<br>". $nomes[2] ."<br>". $nomes[1] ."<br>". $nomes[0];
?>