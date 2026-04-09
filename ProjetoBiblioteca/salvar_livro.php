<?php
error_reporting(E_ALL);
ini_set('display_erros', 1 );


//Criar pasta para salvar os livros
if(!is_dir("capas"));
mkdir("capas", 0777, true);

//Salvar os pdfs
if(!is_dir("pdfs"));
mkdir("pdfs", 0777, true);

//Recebendo os dados do formulário
$titulo = $_POST["tituloInput"];
$autor = $_POST["autorInput"];
$ano = $_POST["anoInput"];
$categoria = $_POST["categSelect"];

//Tratamento dos nomes
$capa = time() . "_" . preg_replace("/[a-zA-Z0-9.]/", "_", $_FILES["capaInput"]["name"]);
$pdf = time() . "_" . preg_replace("/[a-zA-Z0-9.]/", "_", $_FILES["arqPdfInput"]["name"]);

move_uploaded_file($_FILES["capaInput"]["tmp_name"], "capas/" . $capa);
move_uploaded_file($_FILES["arqPdfInput"]["tmp_name"], "pdfs/" . $pdf);

//Colocar como disponível o livro
$status = "disponivel";

//Como estamos usando texto iremos inserir o caracter | para separar as informações
$linha = "$titulo|$autor|$ano|$categoria|$capa|$pdf|$status\n";

//Gravar as informações em um arquivo
file_put_contents("livros.txt", $linha, FILE_APPEND);

//Redirecionar para a página livros
header("location: index.php");
exit();

?>