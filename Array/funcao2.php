<?php
$quantidadeNotas = 4;

$notas = array_fill(0, $quantidade, "");
$erros = [];
$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $soma = 0;
    for ($i=0; $i < $quantidadeNotas; $i++) { 
        $campo = "nota{$i}"; 
        $valor = isset($_POST[$campo]) ? trim($_POST[$campo]) : "";
        $notas[$i] = $valor;

        if($valor === "")
        {
            $erros[] = "A nota " . ($i+1) . " está vazia.";
            continue;
        }

        if(!is_numeric($valor))
        {
            $erros[] = "A nota " . ($i + 1) . " precisa ser numérica.";
            continue;
        }

        $num = (float)$valor;
        if($num < 0 || $num  > 10)
        {
            $erros[] = "A nota " . ($i+1) . " deve estar entre 0 e 10.";
            continue;
        }

        $soma += $num; 
    }
    if(!$erros)
    {
        $media = $soma / $quantidadeNotas;
        $resultado = [
            'soma' => $soma,
            'media' => $media,
            'status' => $media >=6 ? 'Aprovado' : 'Reprovado'
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Cadastro do Aluno</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Cadastro do Aluno</h1>
            <p class="foodter"> Exemplo A - inputs e processamento com 
            <strong>for</strong></p>
            <?php if(!empty($erros)):?>
                <div class="msg erros">
                    <strong>Corrija os seguintes pontos:</strong>
                    <ul class="lista-erros">
                        <?php foreach($erros as $e):?>
                            <li><?=htmlspecialchars($e)?></li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <?php endif;?>
                <?php if($resultado):?>
                    <div class="msg ok resultados">
                        <p><strong>Soma:</strong><?=number_format($resultado['soma'],
                        2,',','.')?></p>
                        <p><strong>Média:</strong><?=number_format($resultado['media'],
                        2,',','.')?></p>
                        <p><strong>Status:</strong><?=$resultado['status']?></p>
                    </div>
                <?php endif?>
        </div>
        <form method="post">
            <div class="grid">
                <?php for($i=0;$i<$quantidadeNotas; $i++):?>
                <div>
                    <label for="nota<?=$i?>">Nota<?= $i+1?>(0 a 10)</label>
                    <input type="number"
                    id="nota<?=$i?>"
                    name="nota<?=$i?>"
                    min="0"
                    max="10"
                    step="0.01"
                    value="<?=htmlspecialchars($notas[$i])?>"
                    required>                    
                </div>
                <?php endfor;?>
            </div>
            <button>Calcular</button>
        </form>
    </div>
</body>
</html>