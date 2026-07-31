<?php
session_start();
require_once "classes/Administrador.php";
require_once "classes/Vendedor.php";
require_once "classes/Cliente.php";

if (isset($_POST["usuario"])) {
    header("location:index.php");
    exit();
}

$usuario = unserialize($_SESSION["usuario"]);
$menu = $usuario->permissoes();
?>

<!DOCTYPE html>
 
<!-- Define que o documento utiliza HTML5 -->
<html lang="pt-br">
 
<head>
 
    <!-- Define a codificação de caracteres -->
    <meta charset="UTF-8">
 
    <!-- Título exibido na aba do navegador -->
    <title>Painel</title>
 
    <!-- Importa o arquivo CSS -->
    <link rel="stylesheet" href="estilo.css">
 
</head>
 
<body>
 
    <!-- Div principal do painel -->
    <div class="painel">
 
        <!-- Título do sistema -->
        <h1>Sistema de Usuários</h1>
 
        <hr>
 
        <!-- Mensagem de boas-vindas -->
        <h2> 
            Bem-vindo, 
            <!-- Exibe o nome do usuário -->
            <?php echo $usuario->getNome(); ?> 
        </h2>
 
        <!-- Exibe o perfil do usuário -->
        <p> 
            Perfil: 
            <strong> 
                <?php echo $usuario->getPerfil(); ?> 
            </strong> 
        </p>

        <hr>
 
        <!-- Título do menu -->
        <h3>MENU</h3>
 
        <!-- ============================= -->
        <!-- Botão Cadastrar Usuários -->
        <!-- Se a permissão "usuarios" for igual a FALSE,
             o botão ficará desabilitado. -->
        <!-- ============================= -->
 
        <button <?php if ($menu["usuarios"] == false) echo "disabled"; ?>>
            Cadastrar Usuários
        </button>
 
        <!-- ============================= -->
        <!-- Botão Excluir Usuários -->
        <!-- Também depende da permissão "usuarios". -->
        <!-- ============================= -->
 
        <button <?php if ($menu["usuarios"] == false) echo "disabled"; ?>>
            Excluir Usuários
        </button>
 
        <!-- ============================= -->
        <!-- Botão Cadastrar Produtos -->
        <!-- Se a permissão "produtos" for igual a FALSE,
             o botão ficará desabilitado. -->
        <!-- ============================= -->
 
        <button <?php if ($menu["produtos"] == false) echo "disabled"; ?>>
            Cadastrar Produtos
        </button>
 
        <!-- ============================= -->
        <!-- Botão Realizar Venda -->
        <!-- Se a permissão "vendas" for igual a FALSE,
             o botão ficará desabilitado. -->
        <!-- ============================= -->
 
        <button <?php if ($menu["vendas"] == false) echo "disabled"; ?>>
            Realizar Venda
        </button>
 
        <!-- ============================= -->
        <!-- Botão Relatórios -->
        <!-- Se a permissão "relatorios" for igual a FALSE,
             o botão ficará desabilitado. -->
        <!-- ============================= -->
 
        <button <?php if ($menu["relatorios"] == false) echo "disabled"; ?>>
            Relatórios
        </button>
 
        <!-- ============================= -->
        <!-- Botão Compras -->
        <!-- Se a permissão "compras" for igual a FALSE,
             o botão ficará desabilitado. -->
        <!-- ============================= -->
 
        <button <?php if ($menu["compras"] == false) echo "disabled"; ?>>
            Compras
        </button>
 
        <br><br>
 
        <!-- Link para sair do sistema -->
        <a href="logout.php"> 
            <!-- Botão Sair -->
            <button class="sair"> 
                Sair 
            </button> 
        </a> 
    </div> 
</body>
</html>
 