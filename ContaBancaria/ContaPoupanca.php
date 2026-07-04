<?php
include_once 'contaBancaria.php';

class ContaPoupanca extends ContaBancaria
{
    private $taxaDeJuros;

    public function __construct($taxaDeJuros = 0.05)
    {
        parent::__construct();
        $this->taxaDeJuros = $taxaDeJuros;
    }

    public function AplicarJuros()
    {
        $juros = round($this->GetSaldo() * $this->taxaDeJuros, 2);
        $this->Depositar($juros);
        echo "Juros de $juros reais aplicados.<br>";
    }
}
    
?>