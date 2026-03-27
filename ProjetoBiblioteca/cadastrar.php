<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include("menu.php");
    ?>
    <div class="content">
        <div class="card">
            <h2>Cadastro de Novo Livro</h2>
            <p>Adicione uma nova obra ao acerbo digital da biblioteca. Preencha as informações
                abaixo e envie a capa e o arquivo digital do livro em formato pdf.
            </p>
            <br>
            <form action="" method="post">
                <label for="tituloInput">Título do Livro</label>
                <input type="text" id="tituloInput" name="tituloInput" required>

                <label for="autorInput">Autor</label>
                <input type="text" id="autorInput" name="autorInput" required>

                <label for="anoInput">Ano da Publicação</label>
                <input type="number" id="anoInput" name="anoInput" required>

                <label for="catSelect">Categoria</label>
                <select name="catSelect" id="catSelect" required>
                    <option value="">Selecione...</option>
                    <option value="r">Romance</option>
                    <option value="lb">Literatura Brasileira</option>
                    <option value="f">Fantasia</option>
                    <option value="fc">Ficção Científica</option>
                    <option value="t">Tecnologia</option>
                    <option value="h">História</option>
                    <option value="i">Infantil</option>
                </select>
                <br><br>

                <label for="">Capa do Livro (imagem)</label>
                <input type="file" id="arqInput" name="arqInput" accept="application/pdf" required>
                <br>
                <button class="btn">Cadastrar Livro</button>
            </form>
        </div>
    </div>
</body>
</html>