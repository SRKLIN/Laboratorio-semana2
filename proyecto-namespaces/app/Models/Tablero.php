<?php

namespace App\Models;

class Tablero
{
    // composición: el Tablero TIENE Columnas (no ES una Columna)
    private array $columnas = [];

    public function agregarColumna(Columna $columna): void
    {
        $this->columnas[] = $columna;
    }

    public function contarTareasTotales(): int
    {
        $suma = 0;
        foreach ($this->columnas as $columna) {
            $suma += $columna->contarTareas();
        }

        return $suma;
    }
}
