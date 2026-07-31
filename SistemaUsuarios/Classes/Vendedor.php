<?php
require_once "Usuarios.php";

class Vendedor extends Usuarios 
{
    public function _construc()
    {
        $this->perfil = "Vendedor";
    }

    public function permissoes()
    {
        return [
            "usuarios" => false,
            "produtos" => true,
            "vendas" => true,
            "relatorios" => false,
            "compras" => false            
        ];
    }
}

?>