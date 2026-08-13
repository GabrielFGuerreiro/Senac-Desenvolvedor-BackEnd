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

    public function RetornarContato($indice)
    {
        return $_SESSION['contatos'][$indice];
    }

    public function AtualizarContato($indice, $nome, $email, $telefone)
    {
        $contatoEditar = $_SESSION['contatos'][$indice];
        $contatoEditar->SetNome($nome);
        $contatoEditar->SetEmail($email);
        $contatoEditar->SetTelefone($telefone);
    }

    public function BuscarContatos($nome)
    {
        $indicesContatos = [];
        foreach($_SESSION['contatos'] as $indice => $contato)
        {
            if(stripos($contato["nome"], $nome))
            {
                $indicesContatos[] = $indice;
            }
        }
        return $indicesContatos;
    }
}