<?php
require_once "Usuarios.php";

class Administrador extends Usuarios 
{
    public function _construc()
    {
        $this->perfil = "Administrador";
    }

    public function permissoes()
    {
        return [
            "usuarios" => true,
            "produtos" => true,
            "vendas" => true,
            "relatorios" => true,
            "compras" => true
            
        ];
    }
}

?>