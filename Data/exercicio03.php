<!-- 3. Crie uma página em php onde o usuário insere a data de admissão e de demissão e mostre quanto tempo a pessoa trabalhou na empresa -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datas Empresa</title>
 </head>
 <body>
    <form action="" method="post">
        <label for="dataAdmissao">Data de Admissão:</label>
        <input type="date" name="dataAdmissao">
        <label for="dataDemissao">Data de Demissão:</label>
        <input type="date" name="dataDemissao">
        <button>Enviar</button>
    </form>
 </body>
 </html>

<?php
$dataAdmissao = $_POST['dataAdmissao'];
$dataDemissao = $_POST['dataDemissao'];

$diferenca = strtotime($dataDemissao) - strtotime($dataAdmissao);
$anos = floor($diferenca / (60 * 60 * 24 * 365));
$meses = floor($diferenca / (60 * 60 * 24 * 30));
$dias = floor($diferenca / (60 * 60 * 24));
echo "Tempo de trabalho: " . $anos . " anos, " . $meses . " meses e " . $dias . " dias.";
?>