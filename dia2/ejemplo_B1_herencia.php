<?php

class Tarea
{
    protected string $titulo;
    protected bool $completada = false;

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function resumen(): string
    {
        return "Tarea: {$this->titulo}";
    }
}

class TareaUrgente extends Tarea
{
    private string $fechaLimite;

    public function __construct(string $titulo, string $fechaLimite)
    {
        parent::__construct($titulo);
        $this->fechaLimite = $fechaLimite;
    }

    public function resumen(): string
    {
        return parent::resumen() . " — Vence: {$this->fechaLimite}";
    }
}

$normal = new Tarea("Leer documentación de Laravel");
$urgente = new TareaUrgente("Entregar Laboratorio I", "2026-08-11");

echo $normal->resumen() . PHP_EOL;
echo $urgente->resumen() . PHP_EOL;
