<?php

interface Notificable
{
    public function notificar(): string;
}

class Tarea
{
    protected string $titulo;

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
    }
}

class TareaUrgente extends Tarea implements Notificable
{
    private string $fechaLimite;

    public function __construct(string $titulo, string $fechaLimite)
    {
        parent::__construct($titulo);
        $this->fechaLimite = $fechaLimite;
    }

    public function notificar(): string
    {
        return "Recordatorio: '{$this->titulo}' vence el {$this->fechaLimite}";
    }
}

function enviarAlertas(array $items): void
{
    foreach ($items as $item) {
        if ($item instanceof Notificable) {
            echo $item->notificar() . PHP_EOL;
        } else {
            echo "(sin notificación: " . get_class($item) . " no implementa Notificable)" . PHP_EOL;
        }
    }
}

$tareas = [
    new Tarea("Leer documentación"),
    new TareaUrgente("Entregar Lab I", "2026-08-11"),
];

enviarAlertas($tareas);
