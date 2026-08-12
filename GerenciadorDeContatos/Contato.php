<?php

class Contato
{
    private $nome;
    private $email;
    private $telefone;

    public function __construct($nome, $email, $telefone)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
    }

    public function GetNome()
    {
        return $this->nome;
    }

    public function GetEmail()
    {
        return $this->email;
    }

    public function GetTelefone()
    {
        return $this->telefone;
    }
}