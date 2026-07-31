<?php
session_start();
require_once "classes/Administrador.php";
require_once "classes/Vendedor.php";
require_once "classes/Cliente.php";

if (isset($_POST["usuario"])) {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if ($usuario == "admin" && $senha == "123") {
        $obj = new Administrador();
        $obj->setNome("Carlos");
        $obj->setEmail("administrador@sistema.com.br");
        $obj->setSenha("123");

        $_SESSION["usuario"] = serialize($obj);
        header("location:painel.php");
        exit();
    }

    if ($usuario == "cliente" && $senha == "123") {
        $obj = new Cliente();
        $obj->setNome("Maria");
        $obj->setEmail("cleinte@sistema.com.br");
        $obj->setSenha("123");

        $_SESSION["usuario"] = serialize($obj);
        header("location:painel.php");
        exit();
    }

    if ($usuario == "vendedor" && $senha == "123") {
        $obj = new Vendedor();
        $obj->setNome("João");
        $obj->setEmail("vendedor@sistema.com.br");
        $obj->setSenha("123");

        $_SESSION["usuario"] = serialize($obj);
        header("location:painel.php");
        exit();
    }

    $erro = "Usuário ou senha inválidos";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div class="login">
        <h2>Sistema de Usuários</h2>

        <form method="post">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>

            <button type="submit">Entrar</button>
        </form>

        <?php
        if (isset($erro)) {
            echo "<p class='erro'>$erro</p>";
        }
        ?>

        <hr>
        <p><strong>Administrador</strong><br>
            Usuário: admin<br>
            Senha:123</p>

        <p><strong>Vendedor</strong><br>
            Usuário: vendedor<br>
            Senha:123</p>

        <p><strong>Cliente</strong><br>
            Usuário: cliente<br>
            Senha:123</p>

    </div>
</body>
</html>