<?php

// Ejercicio A.4 — CuentaBancaria: el setter valida antes de asignar
class CuentaBancaria
{
    private float $saldo = 0;

    public function depositar(float $monto): void
    {
        if ($monto <= 0) {
            throw new InvalidArgumentException("El monto a depositar debe ser mayor que cero.");
        }
        $this->saldo += $monto;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }
}

$cuenta = new CuentaBancaria();

echo "Saldo inicial: " . $cuenta->getSaldo() . PHP_EOL;

$cuenta->depositar(150.50);
echo "Saldo después de depositar 150.5: " . $cuenta->getSaldo() . PHP_EOL;

// el depósito inválido no debe alterar el saldo
try {
    $cuenta->depositar(-20);
} catch (\InvalidArgumentException $e) {
    echo "Excepción capturada: " . $e->getMessage() . PHP_EOL;
}

echo "Saldo tras el intento fallido (sin modificación): " . $cuenta->getSaldo() . PHP_EOL;
