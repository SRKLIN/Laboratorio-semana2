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
    private float $total;

    public function __construct(string $numero, float $total)
    {
        $this->numero = $numero;
        $this->total = $total;
    }

    public function imprimir(): string
    {
        return "Factura #{$this->numero} - Total: \${$this->total}";
    }
}

// 3. Clase Recibo que implementa Imprimible (sin herencia con Factura)
class Recibo implements Imprimible
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
        return "Recibo de pago #{$this->numero} - Monto: \${$this->monto}";
    }
}

// 4. Función polimórfica: solo imprime lo que cumple el contrato
function imprimirTodos(array $items): void
{
    foreach ($items as $item) {
        if ($item instanceof Imprimible) {
            echo $item->imprimir() . PHP_EOL;
        }
    }
}

$factura = new Factura("001", 125.50);
$recibo = new Recibo("045", 60.00);

imprimirTodos([$factura, $recibo]);
