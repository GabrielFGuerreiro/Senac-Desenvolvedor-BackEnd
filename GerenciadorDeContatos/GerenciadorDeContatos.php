<?php

class GerenciadorDeContatos
{
    public function AdicionarContato($nome, $email, $telefone)
    {
        $contato = new Contato($nome, $email, $telefone);
        $_SESSION['contatos'][] = $contato;
    }

    public function GetContatos()
    {
        return $_SESSION['contatos'];
    }

    public function DeletarContato($indice)
    {
        if(isset($_SESSION['contatos'][$indice]))
        {
            array_splice($_SESSION['contatos'], $indice, 1);
        }
    }
}