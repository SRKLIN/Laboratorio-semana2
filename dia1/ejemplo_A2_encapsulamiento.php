<?php

class Tarea
{
    private string $titulo;

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }
}

$t = new Tarea("Aprender encapsulamiento");

echo "Acceso correcto mediante método público:" . PHP_EOL;
echo "\$t->getTitulo() => " . $t->getTitulo() . PHP_EOL;

// echo $t->titulo; // Fatal error: Cannot access private property Tarea::$titulo
