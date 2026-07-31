<?php

class Tarea
{
    public string $titulo;
    public bool $completada = false;

    public function marcarCompletada(): void
    {
        $this->completada = true;
    }
}

$tarea1 = new Tarea();
$tarea1->titulo = "Diseñar tablero Kanban";

$tarea2 = new Tarea();
$tarea2->titulo = "Configurar Composer";

echo "Antes de marcar completada:" . PHP_EOL;
echo "Tarea 1 -> {$tarea1->titulo} | completada: " . var_export($tarea1->completada, true) . PHP_EOL;
echo "Tarea 2 -> {$tarea2->titulo} | completada: " . var_export($tarea2->completada, true) . PHP_EOL;

$tarea1->marcarCompletada();

echo PHP_EOL . "Después de \$tarea1->marcarCompletada():" . PHP_EOL;
echo "Tarea 1 -> {$tarea1->titulo} | completada: " . var_export($tarea1->completada, true) . PHP_EOL;
echo "Tarea 2 -> {$tarea2->titulo} | completada: " . var_export($tarea2->completada, true) . PHP_EOL;
