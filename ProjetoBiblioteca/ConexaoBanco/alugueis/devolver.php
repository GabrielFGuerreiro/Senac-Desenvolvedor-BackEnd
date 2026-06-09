<?php
require '../conexao.php';

$id = $_GET['id'] ?? null;
$livro_id = $_GET['livro_id'] ?? null;

try
{
    $pdo->prepare ("UPDATE alugueis set devolvido = 1 WHERE id = :id")
        ->execute([':id' => $id]);
    $pdo->prepare("UPDATE livros set disponivel = 1 WHERE id = :id")
        ->execute([':id' => $livro_id]);
    echo "<script>
            alert('Livro devolvido com sucesso!');
            window.location.href = 'listar.php';
          </script>";
}
catch (PDOException $e)
{
    echo "Erro: " . $e->getMessage();
}

?>