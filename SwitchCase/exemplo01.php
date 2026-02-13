<?php
$opcao = 2;
$a = 10;
$b = 5;
 
switch ($opcao) {
    case 1:
        echo "Soma: " . ($a + $b);
        break;
    case 2:
        echo "Subtração: " . ($a - $b);
        break;
    case 3:
        echo "Multiplicação: " . ($a * $b);
        break;
    case 4:
        echo "Divisão: " . ($a / $b);
        break;
    default:
        echo "Opção inválida";
}
?>