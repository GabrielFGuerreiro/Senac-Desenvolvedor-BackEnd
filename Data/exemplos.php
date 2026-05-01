<?php
$date = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));
echo "Data atual: " . $date->format("Y-m-d") . "<br>";
echo "Hora atual: " . $date->format("H:i:s") . "<br>";

$data  ="2024-06-02";
$data_formatada = date("d/m/Y", strtotime($data));
echo "Data formatada: " . $data_formatada . "<br>";

$nova_data = date("Y-m-d", strtotime($data . "+ 1 day"));
echo "Nova data: " . $nova_data . "<br>";

$data2 = "2024-06-10";
$diferenca = strtotime($data2) - strtotime($data);
$dias = floor($diferenca / (60 * 60 * 24));
echo "Diferença em dias: " . $dias;
?>