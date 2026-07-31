<?php

// Ejercicio A.3 — Clase Vehiculo: el constructor exige los datos obligatorios
class Vehiculo
{
    private string $marca;
    private int $anio;

    public function __construct(string $marca, int $anio)
    {
        $this->marca = $marca;
        $this->anio = $anio;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function getAnio(): int
    {
        return $this->anio;
    }

    public function antiguedad(int $anioActual): int
    {
        return $anioActual - $this->anio;
    }
}

$v = new Vehiculo("Toyota", 2019);

echo "Vehículo: " . $v->getMarca() . " (" . $v->getAnio() . ")" . PHP_EOL;
echo "Antigüedad en 2026: " . $v->antiguedad(2026) . " años" . PHP_EOL;
