<?php

session_start();

class ContaBancaria
{
    private $saldo;

    public function __construct()
    {
        $this->saldo = isset($_SESSION['saldo']) ? $_SESSION['saldo'] : 0;
    }

    public function SetSaldo($saldo)
    {
        $this->saldo = $saldo;
        $_SESSION['saldo'] = $this->saldo;
    }

    public function GetSaldo()
    {
        return $this->saldo;
    }

    public function Depositar($quantidade)
    {
        if($quantidade > 0)
        {
            $saldoNovo = $this->saldo + $quantidade;   
            $this->SetSaldo($saldoNovo);
        }
    }

    public function Sacar($quantidade)
    {
        if($quantidade > 0 && $quantidade <= $this->GetSaldo())
        {
            $saldoNovo = $this->saldo - $quantidade;
            $this->SetSaldo($saldoNovo);
        }
        else{
            echo "Saldo insuficiente para o saque.<br>";
        }
    }
}

?>