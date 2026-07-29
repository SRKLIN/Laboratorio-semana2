<?php

// 1. Interfaz que define el contrato
interface Imprimible
{
    public function imprimir(): string;
}

// 2. Clase Factura que implementa Imprimible
class Factura implements Imprimible
{
    private string $numero;
    private float $monto;

    public function __construct(string $numero, float $monto)
    {
        $this->numero = $numero;
        $this->monto = $monto;
    }

    public function imprimir(): string
    {
        return "FACTURA {$this->numero} - Total: $" . number_format($this->monto, 2);
    }
}

// 3. Clase Recibo que implementa Imprimible
class Recibo implements Imprimible
{
    private string $concepto;
    private float $monto;

    public function __construct(string $concepto, float $monto)
    {
        $this->concepto = $concepto;
        $this->monto = $monto;
    }

    public function imprimir(): string
    {
        return "RECIBO por {$this->concepto} - $" . number_format($this->monto, 2);
    }
}

// 4. Función polimórfica auxiliar
function procesarImpresion(Imprimible $doc): void
{
    echo $doc->imprimir() . PHP_EOL;
}