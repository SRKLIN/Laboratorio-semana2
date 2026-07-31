<?php

// Ejercicio A.5 — Producto del Ejemplo A.5 extendido con aplicarDescuento()
class Producto
{
    private string $nombre;
    private float $precio;
    private int $stock = 0;

    public function __construct(string $nombre, float $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function agregarStock(int $cantidad): void
    {
        $this->stock += $cantidad;
    }

    public function vender(): void
    {
        if ($this->stock <= 0) {
            throw new RuntimeException("Sin stock disponible de {$this->nombre}");
        }
        $this->stock--;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    // método nuevo del ejercicio: valida el rango antes de tocar el precio
    public function aplicarDescuento(float $porcentaje): void
    {
        if ($porcentaje < 0 || $porcentaje > 100) {
            throw new InvalidArgumentException("El porcentaje de descuento debe estar entre 0 y 100.");
        }
        $this->precio = $this->precio * (1 - $porcentaje / 100);
    }
}

$producto = new Producto("Casco de bicicleta", 24.99);

echo "Precio original: " . $producto->getPrecio() . PHP_EOL;

$producto->aplicarDescuento(20);
echo "Precio con 20% de descuento: " . $producto->getPrecio() . PHP_EOL;

try {
    $producto->aplicarDescuento(150);
} catch (\InvalidArgumentException $e) {
    echo "Excepción capturada: " . $e->getMessage() . PHP_EOL;
}
