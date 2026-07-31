<?php
require 'vendor/autoload.php';

use App\Models\Tablero;
use App\Models\Tarea;
use App\Models\TareaUrgente;
use App\Models\TareaRecurrente;
use App\Contracts\Notificable;
use App\Contracts\Comentable;

$tablero = new Tablero("TaskBoard CE-ISC019");

// cuatro tareas de tres tipos distintos
$t1 = new Tarea("Redactar el manual de usuario");
$t2 = new TareaUrgente("Entregar Laboratorio I", "2026-08-11");
$t3 = new TareaRecurrente("Respaldar la base de datos", "semanal");
$t4 = new TareaRecurrente("Revisar el tablero del equipo", "diaria");

// se distribuyen en distintas columnas
$tablero->agregarTarea($t1);
$tablero->agregarTarea($t2, 'En progreso');
$tablero->agregarTarea($t3);
$tablero->agregarTarea($t4, 'Hecho');

echo $tablero->resumenGeneral();
echo "Tareas totales en el tablero: " . $tablero->contarTareasTotales() . PHP_EOL;

// polimorfismo: cada clase resuelve notificar() a su manera
echo PHP_EOL . "--- Avisos pendientes ---" . PHP_EOL;
foreach ([$t1, $t2, $t3, $t4] as $tarea) {
    if ($tarea instanceof Notificable) {
        echo $tarea->notificar() . PHP_EOL;
    }
}

// los comentarios provienen del contrato Comentable, común a todas las tareas
echo PHP_EOL . "--- Comentarios ---" . PHP_EOL;
$t2->agregarComentario("Pendiente de revisión con el catedrático");
$t2->agregarComentario("Falta adjuntar el diagrama de clases");

if ($t2 instanceof Comentable) {
    echo "{$t2->getTitulo()} tiene " . $t2->contarComentarios() . " comentario(s):" . PHP_EOL;
    foreach ($t2->getComentarios() as $comentario) {
        echo " * {$comentario}" . PHP_EOL;
    }
}

// el límite WIP de la columna se respeta
echo PHP_EOL . "--- Límite de trabajo en progreso ---" . PHP_EOL;
try {
    $enProgreso = $tablero->getColumna('En progreso');
    while (true) {
        $enProgreso->agregarTarea(new Tarea("Tarea de relleno"));
    }
} catch (\RuntimeException $e) {
    echo "Excepción capturada: " . $e->getMessage() . PHP_EOL;
}
