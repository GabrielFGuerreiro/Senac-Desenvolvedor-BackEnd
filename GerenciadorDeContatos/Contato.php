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

    public function SetNome($nome)
    {
        $this->nome = $nome;
    }

    public function GetEmail()
    {
        return $this->email;
    }

    public function SetEmail($email)
    {
        $this->email = $email;
    }

    public function GetTelefone()
    {
        return $this->telefone;
    }

    public function SetTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
}