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
        if ($_POST['indiceEditar'] == "")
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
    else if(isset($_POST['nome']))
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
        <input type="hidden" id="indiceEditar" name="indiceEditar" value="">

        <input type="text" id="nome" name="nome" placeholder="Digite o Nome">
        <input type="email" id="email" name="email" placeholder="Digite o E-mail">
        <input type="tel" id="telefone" name="telefone" placeholder="Digite o Telefone"><br>

        <button id="btnAddAtt" name="adicionar" type="submit">Adicionar Contato</button>
        <button type="button" id="btnCancelar" style="display:none">Cancelar</button>

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
                    <button type="button" class="btnEditar" value="<?= $indice ?>" data-nome="<?= $contato->GetNome() ?>" data-email="<?= $contato->GetEmail() ?>" data-tel="<?= $contato->GetTelefone() ?>">Editar</button>
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
    let btnCancelar = document.getElementById("btnCancelar");
    let indiceEditar = document.getElementById("indiceEditar");

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

    btnCancelar.addEventListener("click", function(e)
    {
        nome.value = "";
        email.value = "";
        tel.value = "";
        btnAddAtt.textContent = "Adicionar Contato";
        indiceEditar.value = "";
        this.style.display = "none";
    });

    let btnsEditar = document.querySelectorAll(".btnEditar");
    btnsEditar.forEach(btnEditar => {
        btnEditar.addEventListener("click", function()
        {
            indiceEditar.value = this.value;
            nome.value = this.dataset.nome;
            email.value = this.dataset.email;
            tel.value = this.dataset.tel;
            btnAddAtt.textContent = "Atualizar Contato";
            btnCancelar.style.display = "inline";            
        });
    });

</script>