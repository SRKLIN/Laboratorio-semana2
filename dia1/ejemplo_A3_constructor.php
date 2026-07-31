<?php

class Tarea
{
    private string $titulo;
    private bool $completada;

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
        $this->completada = false;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }
}

$t1 = new Tarea("Diseñar tablero Kanban");
$t2 = new Tarea("Configurar Composer");

echo "Cada objeto se crea ya con su título asignado:" . PHP_EOL;
echo " - {$t1->getTitulo()}" . PHP_EOL;
echo " - {$t2->getTitulo()}" . PHP_EOL;

echo PHP_EOL . "=== Solución de errores: propiedad no inicializada ===" . PHP_EOL;

class TareaSinConstructor
{
    private string $titulo;

    public function getTitulo(): string
    {
        return $this->titulo;
    }
}

$roto = new TareaSinConstructor();
try {
    echo $roto->getTitulo();
} catch (\Error $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
