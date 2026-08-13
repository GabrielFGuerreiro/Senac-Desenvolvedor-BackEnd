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
    if(isset($_POST['nome'], $_POST['email'], $_POST['telefone']) && !isset($_POST['buscar']))
    {
        if (!isset($_POST['indiceEditar']))
        {
            $gerenciadorDeContatos->AdicionarContato($_POST['nome'], $_POST['email'], $_POST['telefone']);
        }
        else
        {
            $gerenciadorDeContatos->AtualizarContato($_POST['indiceEditar'], $_POST['nome'], $_POST['email'], $_POST['telefone']);
        }
    }
    else if(isset($_POST['deletar']))
    {
        $gerenciadorDeContatos->DeletarContato($_POST['deletar']);
    }

    else if(isset($_POST['atualizar']))
    {
        $indiceEditar = $_POST['atualizar'];
        $contatoEditar = $gerenciadorDeContatos->RetornarContato($_POST['atualizar']);
    }
    else
    {
        $indicesBuscados = $gerenciadorDeContatos->BuscarContatos($_POST['nome']);
    }
}

$contatos = $gerenciadorDeContatos->GetContatos();
if (isset($indicesBuscados)) {
    $contatosExibir = [];

    foreach ($indicesBuscados as $indice) {
        $contatosExibir[$indice] = $contatos[$indice];
    }
} else {
    $contatosExibir = $contatos;
}
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

    <form method="POST" action="" id="formContato">
        <input type="text" id="nome" name="nome" placeholder="Digite o Nome" value="<?= isset($contatoEditar) ? $contatoEditar->GetNome() : "" ?>">
        <input type="email" id="email" name="email" placeholder="Digite o E-mail" value="<?= isset($contatoEditar) ? $contatoEditar->GetEmail() : "" ?>">
        <input type="tel" id="telefone" name="telefone" placeholder="Digite o Telefone" value="<?= isset($contatoEditar) ? $contatoEditar->GetTelefone() : "" ?>"><br>

        <button id="btnAddAtt" type="submit"><?= isset($contatoEditar) ? "Atualizar Contato" : "Adicionar Contato" ?></button>
        <?php if (isset($contatoEditar)): ?>
            <input type="hidden" name="indiceEditar" value="<?= $indiceEditar ?>">
            <button type="button" id="btnCancelar">Cancelar</button>
        <?php endif; ?>

        <button type="submit" id="btnBuscar" name="buscar">Buscar Nome</button>
    </form>
    <p>Quantidade de Contatos:<?= $gerenciadorDeContatos->ContarContatos() ?></p>

    <?php if (isset($qntContatos)): ?>
        <input type="number" value="<?= $qntContatos ?>">
    <?php endif; ?>

    <ul>
        <?php foreach ($contatosExibir as $indice => $contato): ?>
            <li>
                <strong>Nome:</strong> <?= htmlspecialchars($contato->GetNome()) ?><br>
                <strong>Email:</strong> <?= htmlspecialchars($contato->GetEmail()) ?><br>
                <strong>Telefone:</strong> <?= htmlspecialchars($contato->GetTelefone()) ?><br>

                <form method="POST" action="" style="display:inline;">
                    <button type="submit" name="deletar" value="<?= $indice ?>">Excluir</button>
                    <button type="submit" name="atualizar" value="<?= $indice ?>">Editar</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

<script>
    let form = document.getElementById("formContato");
    let nome = document.getElementById("nome");
    let email = document.getElementById("email");
    let tel = document.getElementById("telefone");
    let btnAddAtt = document.getElementById("btnAddAtt");

    btnAddAtt.addEventListener("click", function(e)
    {
        e.preventDefault();

        if(!nome.value || !email.value || !tel.value)
        {
            alert("Preencha Todos os Campos");
            return;
        }

       form.submit();
    });

    
    document.getElementById("btnBuscar").addEventListener("click", function(e)
    {
        e.preventDefault();
        
        if(!nome.value)
        {
            alert("Preencha o Nome");
            return;
        }

       form.submit();
    });

    document.getElementById("btnCancelar").addEventListener("click", function(e)
    {
        nome.value = "";
        email.value = "";
        tel.value = "";
        btnAddAtt.textContent = "Adicionar Contato";
        this.style.display = "none";
    });
</script>