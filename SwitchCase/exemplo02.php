<?php
$nota = 'B';
 
switch ($nota) {
    case 'A':
        echo "Excelente";
        break;
    case 'B':
        echo "Bom";
        break;
    case 'C':
        echo "Regular";
        break;
    case 'D':
        echo "Ruim";
        break;
    default:
        echo "Nota inválida";
}
?>