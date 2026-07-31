<?php

// Ejercicio B.1 — Nómina simple mediante herencia
class Empleado
{
    private string $nombre;
    private float $salarioBase;

    public function __construct(string $nombre, float $salarioBase)
    {
        $this->nombre = $nombre;
        $this->salarioBase = $salarioBase;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function calcularPago(): float
    {
        return $this->salarioBase;
    }
}

class EmpleadoComision extends Empleado
{
    private float $comision;

    public function __construct(string $nombre, float $salarioBase, float $comision)
    {
        parent::__construct($nombre, $salarioBase);
        $this->comision = $comision;
    }

    // $salarioBase puede seguir siendo private: aquí solo se reutiliza parent::calcularPago()
    public function calcularPago(): float
    {
        return parent::calcularPago() + $this->comision;
    }
}

$ana = new Empleado("Ana", 500);
$kevin = new EmpleadoComision("Kevin", 500, 150);

echo "Pago de " . $ana->getNombre() . " (empleado base): $" . $ana->calcularPago() . PHP_EOL;
echo "Pago de " . $kevin->getNombre() . " (con comisión): $" . $kevin->calcularPago() . PHP_EOL;
