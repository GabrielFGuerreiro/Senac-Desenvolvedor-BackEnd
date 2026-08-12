<?php
require_once 'Contato.php';
require_once 'GerenciadorDeContatos.php';

session_start();

if (!isset($_SESSION['contatos'])) {
    $_SESSION['contatos'] = [];
}

$gerenciadorDeContatos = new GerenciadorDeContatos();
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['nome'], $_POST['email'], $_POST['telefone']))
    {
        $gerenciadorDeContatos->AdicionarContato($_POST['nome'],
        $_POST['email'], $_POST['telefone']);
    }

    if(isset($_POST['deletar']))
    {
        $gerenciadorDeContatos->DeletarContato($_POST['deletar']);
    }
}

$contatos  = $gerenciadorDeContatos->GetContatos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenaciador de Contatos</title>
</head>
<body>
    <h1>Gerenciador de Contatos</h1>

    <form method="POST" action="">
        <input type="text" name="nome" placeholder="Digite o Nome" required>
        <input type="email" name="email" placeholder="Digite o E-mail" required>
        <input type="tel" name="telefone" placeholder="Digite o Telefone" required><br>

        <button type="submit">Adicionar Contato</button>
    </form>

    <ul>
        <?php foreach($contatos as $indice => $contato): ?>
            <li>
                <strong>Nome:</strong> <?= htmlspecialchars($contato->GetNome()) ?><br>
                <strong>Email:</strong> <?= htmlspecialchars($contato->GetEmail()) ?><br>
                <strong>Telefone:</strong> <?= htmlspecialchars($contato->GetTelefone()) ?><br>

                <form method="POST" action="" style="display:inline;">
                    <button type="submit" name="deletar" value="<?= $indice ?>">Excluir</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>