<?php

namespace App\Models;

use App\Contracts\Notificable;

/**
 * Tarea que se repite con cierta periodicidad. Su notificar() no depende de
 * una fecha límite, sino de la frecuencia: comportamiento distinto al de
 * TareaUrgente aunque ambas cumplan el mismo contrato (polimorfismo).
 */
class TareaRecurrente extends Tarea implements Notificable
{
    private const FRECUENCIAS = ['diaria', 'semanal', 'mensual'];

    // adjetivo empleado en el texto del recordatorio
    private const ADVERBIOS = [
        'diaria'  => 'diario',
        'semanal' => 'semanal',
        'mensual' => 'mensual',
    ];

    private string $frecuencia;

    public function __construct(string $titulo, string $frecuencia)
    {
        parent::__construct($titulo);

        if (!in_array($frecuencia, self::FRECUENCIAS, true)) {
            throw new \InvalidArgumentException(
                "La frecuencia debe ser: " . implode(", ", self::FRECUENCIAS) . "."
            );
        }

        $this->frecuencia = $frecuencia;
    }

    public function getFrecuencia(): string
    {
        return $this->frecuencia;
    }

    public function notificar(): string
    {
        return "Recordatorio " . self::ADVERBIOS[$this->frecuencia] . ": pendiente '{$this->titulo}'";
    }
}
