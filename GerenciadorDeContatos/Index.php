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
        if (!isset($_POST['indiceEditar']))
        {
            $gerenciadorDeContatos->AdicionarContato($_POST['nome'], $_POST['email'], $_POST['telefone']);
        }
        else
        {
            $gerenciadorDeContatos->AtualizarContato($_POST['indiceEditar'], $_POST['nome'], $_POST['email'], $_POST['telefone']);        }

    }

    if(isset($_POST['deletar']))
    {
        $gerenciadorDeContatos->DeletarContato($_POST['deletar']);
    }

    if(isset($_POST['atualizar']))
    {
        $indiceEditar = $_POST['atualizar'];
        $contatoEditar = $gerenciadorDeContatos->RetornarContato($_POST['atualizar']);
    }
}

$contatos = $gerenciadorDeContatos->GetContatos();

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
        <input type="text" name="nome" placeholder="Digite o Nome" value="<?= isset($contatoEditar) ? $contatoEditar->GetNome() : "" ?>"required>
        <input type="email" name="email" placeholder="Digite o E-mail" value="<?= isset($contatoEditar) ? $contatoEditar->GetEmail() : "" ?>" required>
        <input type="tel" name="telefone" placeholder="Digite o Telefone" value="<?= isset($contatoEditar) ? $contatoEditar->GetTelefone() : "" ?>" required><br>

        <?php if (isset($contatoEditar)): ?>
            <input type="hidden" name="indiceEditar" value="<?= $indiceEditar ?>">
        <?php endif; ?>

        <button type="submit"><?= isset($contatoEditar) ? "Atualizar Contato" : "Adicionar Contato" ?></button>
    </form>

    <ul>
        <?php foreach($contatos as $indice => $contato): ?>
            <li>
                <strong>Nome:</strong> <?= htmlspecialchars($contato->GetNome()) ?><br>
                <strong>Email:</strong> <?= htmlspecialchars($contato->GetEmail()) ?><br>
                <strong>Telefone:</strong> <?= htmlspecialchars($contato->GetTelefone()) ?><br>

                <form method="POST" action="" style="display:inline;">
                    <button type="submit" name="deletar" value="<?= $indice ?>">Excluir</button>
                    <button type="submit" class="btnEditar" name="atualizar" value="<?= $indice ?>">Editar</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

<script>
    document.querySelectorAll(".btnEditar").forEach(botao => {
        botao.addEventListener("click", function()
        {
            document.getElementById("btnAddContato").textContent="teste";
        });
    });
    

</script>