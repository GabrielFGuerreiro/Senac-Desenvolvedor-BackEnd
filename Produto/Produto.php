<?php

class Produto {
    private $codigo;
    private $nome;
    private $preco;
    private $quantidade;

    public function __construct($codigo, $nome, $preco, $quantidade) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }

    public function exibirProduto()
    {
        echo "<h2>Produto Cadastrado</h2>"
        . "Código: {$this->codigo}<br>"
        . "Nome: {$this->nome}<br>"
        . "Preço: R$" . number_format($this->preco, 2, ',', '.') . "<br>"
        . "Quantidade: {$this->quantidade}<br>";
    }
}
?>