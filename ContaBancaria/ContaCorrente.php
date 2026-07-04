<?php
include_once 'ContaBancaria.php';

class ContaCorrente extends ContaBancaria
{
    private $limite;

    public function __construct($limite = 500)
    {
        parent::__construct();
        $this->limite = isset($_SESSION['limite']) ? $_SESSION['limite'] : $limite;
    }

    public function GetLimite()
    {
        return $this->limite;
    }

    public function SetLimite($limite)
    {
        $this->limite = $limite;
        $_SESSION['limite'] = $this->limite;
    }

    public function Sacar($quantidade)
    {
        $saldoDisponivel = $this->GetSaldo() + $this->limite;
        if($quantidade >  0 && $quantidade <= $saldoDisponivel)
        {
            if($quantidade > $this->GetSaldo())
            {
                $valorUsadoLimite = $quantidade - $this->GetSaldo();
                $this->SetLimite($this->limite - $valorUsadoLimite);
                $this->SetSaldo(0);
                echo "Saque de R$$quantidade reais realizado, utilizando R$$valorUsadoLimite do limite.";
                echo "Limite restante: R$ " . number_format($this->limite, 2, ',', '.');
            }
            else
            {
                $this->SetSaldo($this->GetSaldo() - $quantidade);
                echo "Saque de R$$quantidade reais realizado com sucesso.";
                
            }
        }
        else
        {
            echo "Saldo e limite insuficientes para o saque.<br>";   
        }
    }
}
?>