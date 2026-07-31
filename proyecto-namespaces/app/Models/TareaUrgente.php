<?php

namespace App\Models;

use App\Contracts\Notificable;

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
