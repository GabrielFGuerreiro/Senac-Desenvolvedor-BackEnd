<?php
require_once 'Calc.php';
$resultado = "";

if(isset($_POST['calcular']))
{
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $operacao = $_POST['operacao'];
    $calc = new Calc();
    switch($operacao)
    {
        case 'somar':
            $resultado = $calc->Somar($valor1, $valor2);
            break;
            
        case 'subtrair':
            $resultado = $calc->Subtrair($valor1, $valor2);
            break;

        case 'multiplicar':
            $resultado = $calc->Multiplicar($valor1, $valor2);
            break;

        case 'dividir':
            if($valor2 != 0)            
                $resultado = $calc->Dividir($valor1, $valor2);            
            else            
                $resultado = "Erro: Divisão por zero!";
            
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora OO</title>
</head>
<body>
    <h1>Calculadora</h1>
    <form method="post">
        <label>Valor 1:</label><br>
        <input type="number" name="valor1" required><br><br>

        <label>Valor 2:</label><br>
        <input type="number" name="valor2" required><br><br>

        <label>Operação:</label><br>
        <select name="operacao">
            <option value="somar">Somar</option>
            <option value="subtrair">Subtrair</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
        </select><br><br>
        <button type="submit" name="calcular">Calcular</button>
    </form>
    <h2>Resultado: <?php echo $resultado; ?></h2>

</body>
</html>