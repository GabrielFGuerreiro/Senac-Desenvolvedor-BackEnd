<?php
require '../conexao.php';
if(!isset($_GET['id']) || empty($_GET['id']))
{
    header("Location: listar.php");
    exit();
}

$id = intval($_GET['id']);
try
{
    $sql = "SELECT imagem FROM livros where id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($livros && !empty($livros['imagem']))
    {
        $caminhoImagem = '../imagens/' . $livros['imagem'];
        if(file_exists($caminhoImagem))
        {
            unlink($caminhoImagem);
        }
    }
    $sql = "DELETE FROM livros WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    header("Location: listar.php");
    exit();
}
catch (PDOException $e)
{
    echo "Erro ao excluir: " . $e->getMessage();
}

?>