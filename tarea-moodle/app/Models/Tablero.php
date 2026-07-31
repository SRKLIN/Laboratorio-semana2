<?php

namespace App\Models;

/**
 * Tablero Kanban. TIENE columnas: relación de composición, no de herencia.
 */
class Tablero
{
    private string $nombre;
    private array $columnas = [];

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;

        // columnas por defecto del flujo Kanban
        $this->agregarColumna(new Columna("Por hacer", 5));
        $this->agregarColumna(new Columna("En progreso", 3));
        $this->agregarColumna(new Columna("Hecho", 20));
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function agregarColumna(Columna $columna): void
    {
        $this->columnas[$columna->getNombre()] = $columna;
    }

    public function getColumna(string $nombre): Columna
    {
        if (!isset($this->columnas[$nombre])) {
            throw new \InvalidArgumentException("No existe la columna '{$nombre}' en el tablero.");
        }

        return $this->columnas[$nombre];
    }

    public function agregarTarea(Tarea $tarea, string $columna = 'Por hacer'): void
    {
        $this->getColumna($columna)->agregarTarea($tarea);
    }

    public function contarTareasTotales(): int
    {
        $suma = 0;
        foreach ($this->columnas as $columna) {
            $suma += $columna->contarTareas();
        }

        return $suma;
    }

    public function resumenGeneral(): string
    {
        $resumen = "Tablero: {$this->nombre}" . PHP_EOL;
        foreach ($this->columnas as $columna) {
            $resumen .= " - {$columna->getNombre()}: {$columna->contarTareas()} tarea(s)" . PHP_EOL;
        }

        return $resumen;
    }
}
