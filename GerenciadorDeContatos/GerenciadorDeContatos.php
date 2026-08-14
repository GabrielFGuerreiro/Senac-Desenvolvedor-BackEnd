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

    public function AtualizarContato($indice, $nome, $email, $telefone)
    {
        $contatoEditar = $_SESSION['contatos'][$indice];
        $contatoEditar->SetNome($nome);
        $contatoEditar->SetEmail($email);
        $contatoEditar->SetTelefone($telefone);
    }

    public function BuscarContatos($nome)
    {
        $indicesBuscados = [];
        foreach ($_SESSION['contatos'] as $indice => $contato) {
            var_dump($contato->GetNome());
            if (stripos($contato->GetNome(), $nome) !== false)
            {
                $indicesBuscados[] = $indice;
            }
        }
        return $indicesBuscados;
    }

    public function ContarContatos()
    {
        return count($_SESSION['contatos']);
    }
}