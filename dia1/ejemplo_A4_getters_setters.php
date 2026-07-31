<?php

class Tarea
{
    private string $titulo;
    private bool $completada = false;

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $nuevo): void
    {
        if (trim($nuevo) === '') {
            throw new InvalidArgumentException("Título vacío");
        }
        $this->titulo = $nuevo;
    }
}

$t = new Tarea("Primer título");
echo "Título inicial: {$t->getTitulo()}" . PHP_EOL;

$t->setTitulo("Título corregido");
echo "Título tras setTitulo(): {$t->getTitulo()}" . PHP_EOL;

echo PHP_EOL . "Intento de asignar un título vacío:" . PHP_EOL;
try {
    $t->setTitulo("   ");
} catch (\InvalidArgumentException $e) {
    echo "Excepción capturada: " . $e->getMessage() . PHP_EOL;
}
