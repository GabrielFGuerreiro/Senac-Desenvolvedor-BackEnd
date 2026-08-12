<?php

class GerenciadorDeContatos
{
    private $contatos = [];

    public function AdicionarContato($nome, $email, $telefone)
    {
        $contato = new Contato($nome, $email, $telefone);
        $_SESSION["contatos"] = $contato;
        var_dump($_SESSION["contatos"]);
    }

    public function GetContatos()
    {
        return $this->contatos;
    }

    public function DeletarContato($indice)
    {
        if(isset($this->contatos[$indice]))
        {
            array_splice($this->contatos, $indice, 1);
        }
    }
}