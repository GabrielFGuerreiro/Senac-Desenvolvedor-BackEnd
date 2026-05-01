<!-- 1. Crie uma página de internet utilizando PHP onde o usuário digita a data e a hora e converta para um país que o usuário também posso escolher. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="dataHoraInput">Digite a data e o horário:</label>
        <input type="datetime-local" name="dataHoraInput">

        <label for="cidadesSelect">Escolha o fuso horário de uma das seguintes cidades:</label>
        <select name="cidadesSelect">
            <option value="M">México</option>
            <option value="HK">Hong Kong</option>
            <option value="T">Tokyo</option>
            <option value="B">Berlin</option>
            <option value="L">London</option>
            <option value="S">Sydney</option>
        </select>
        
        <button>Enviar</button>
    </form>
    
</body>
</html>

<?php
$cidade = $_POST['cidadesSelect'];
$dataHoraInput = $_POST['dataHoraInput'];
$dataHoraNova = new DateTime($dataHoraInput, new DateTimeZone("America/Sao_Paulo"));

switch ($cidade) {
    case 'M':
        $dataHoraNova->setTimezone(new DateTimeZone("America/Mexico_City"));
        break;

    case 'HK':
        $dataHoraNova->setTimezone(new DateTimeZone("Asia/Hong_Kong"));
        break;

    case 'T':
        $dataHoraNova->setTimezone(new DateTimeZone("Asia/Tokyo"));
        break;

    case 'B':
        $dataHoraNova->setTimezone(new DateTimeZone("Europe/Berlin"));
        break;

    case 'L':
        $dataHoraNova->setTimezone(new DateTimeZone("Europe/London"));
        break;

    case 'S':
        $dataHoraNova->setTimezone(new DateTimeZone("Australia/Sydney"));
        break;
}
echo "Data e hora convertida: " . $dataHoraNova->format("d-m-Y H:i:s");

?>
