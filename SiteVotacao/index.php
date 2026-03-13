<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <form method="post">
        <h1>Votação de Representante!</h1>
        <label for="entryEmail">Digite seu email para entrar na votação</label>
        <input type="email" name="entryEmail" id="entryEmail" required>
        <button>Entrar</button>
    </form>
</body>
</html>

<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['entryEmail'] = $_POST['entryEmail'];
    header('Location: menu.php'); 
    exit();
}

?>
