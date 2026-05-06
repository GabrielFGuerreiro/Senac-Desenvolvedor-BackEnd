<?php
$host = "localhost";
$banco = "biblioteca";
$usuario = "root";
$senha = "usbw";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charsetc=utf8",$usuario,$senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}
?>