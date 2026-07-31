<?php
require_once "Usuarios.php";

class Cliente extends Usuarios 
{
    public function _construc()
    {
        $this->perfil = "Cliente";
    }

    public function permissoes()
    {
        return [
            "usuarios" => false,
            "produtos" => false,
            "vendas" => false,
            "relatorios" => false,
            "compras" => true            
        ];
    }
}

?>