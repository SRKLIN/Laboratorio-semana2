<?php

namespace App\Models;

/**
 * Columna del tablero. TIENE tareas (composición) y respeta un límite de
 * trabajo en progreso (WIP).
 */
class Columna
{
    private string $nombre;
    private int $limiteWip;
    private array $tareas = [];

    public function __construct(string $nombre, int $limiteWip = 5)
    {
        $this->nombre = $nombre;
        $this->limiteWip = $limiteWip;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getLimiteWip(): int
    {
        return $this->limiteWip;
    }

    public function agregarTarea(Tarea $tarea): void
    {
        if ($this->estaLlena()) {
            throw new \RuntimeException(
                "La columna '{$this->nombre}' alcanzó su límite WIP de {$this->limiteWip} tarea(s)."
            );
        }
        $this->tareas[] = $tarea;
    }

    public function contarTareas(): int
    {
        return count($this->tareas);
    }

    public function estaLlena(): bool
    {
        return $this->contarTareas() >= $this->limiteWip;
    }

    public function getTareas(): array
    {
        return $this->tareas;
    }
}
