<?php
class Usuarios {
    //atributos
    public $nome;
    public $email;
    protected $perfil;
    private $senha;
 
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setPerfil($perfil){
        $this->perfil = $perfil;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function login() {
        return true;
    }

    public function logout() {
        session_destroy();
        header("location: index.php");
        exit;
    }

    public function permissoes() {
        return [];
    }
}
?>