<?php
class Calc
{
private $valor1;
private $valor2;
private $resultado;


public function Somar($valor1, $valor2)
{
    $this->resultado = $valor1 + $valor2;
    return $this->resultado;
}

public function Subtrair($valor1, $valor2)
{
    $this->resultado = $valor1 - $valor2;
    return $this->resultado;
}

public function Multiplicar($valor1, $valor2)
{
    $this->resultado = $valor1 * $valor2;
    return $this->resultado;
}

public function Dividir($valor1, $valor2)
{
    $this->resultado = $valor1 / $valor2;
    return $this->resultado;
}

}
