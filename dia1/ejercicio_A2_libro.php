<?php

// Ejercicio A.2 — Clase Libro con disponibilidad encapsulada
class Libro
{
    private string $tituloLibro;
    private bool $disponible = true;

    public function __construct(string $tituloLibro)
    {
        $this->tituloLibro = $tituloLibro;
    }

    public function getTituloLibro(): string
    {
        return $this->tituloLibro;
    }

    public function getDisponible(): bool
    {
        return $this->disponible;
    }

    public function prestar(): void
    {
        $this->disponible = false;
    }
}

$libro1 = new Libro("Clean Code");

echo "Título: " . $libro1->getTituloLibro() . " | Disponible: " . var_export($libro1->getDisponible(), true) . PHP_EOL;

$libro1->prestar();

echo "Después de prestar() -> Disponible: " . var_export($libro1->getDisponible(), true) . PHP_EOL;
