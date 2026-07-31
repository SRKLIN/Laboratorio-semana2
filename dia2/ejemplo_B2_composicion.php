<?php

class Columna
{
    private string $nombre;

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }
}

class Tablero
{
    private array $columnas = [];

    public function agregar(Columna $columna): void
    {
        $this->columnas[] = $columna;
    }

    public function listarColumnas(): array
    {
        return array_map(fn (Columna $c) => $c->getNombre(), $this->columnas);
    }
}

$tablero = new Tablero();
$tablero->agregar(new Columna("Por hacer"));
$tablero->agregar(new Columna("En progreso"));
$tablero->agregar(new Columna("Hecho"));

echo "Composición (TIENE-UN): columnas del tablero -> " . implode(", ", $tablero->listarColumnas()) . PHP_EOL;
