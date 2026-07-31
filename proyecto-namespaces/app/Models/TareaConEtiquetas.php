<?php

namespace App\Models;

class TareaConEtiquetas extends Tarea
{
    private array $etiquetas = [];

    public function agregarEtiqueta(string $etiqueta): void
    {
        // in_array evita los duplicados
        if (!in_array($etiqueta, $this->etiquetas, true)) {
            $this->etiquetas[] = $etiqueta;
        }
    }

    public function getEtiquetas(): array
    {
        return $this->etiquetas;
    }
}
