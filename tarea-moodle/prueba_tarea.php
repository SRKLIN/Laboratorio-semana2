<?php
require __DIR__ . '/vendor/autoload.php';

use App\Models\Tablero;
use App\Models\Tarea;
use App\Models\TareaUrgente;
use App\Models\TareaRecurrente;
use App\Models\Columna;
use App\Contracts\Notificable;
use App\Contracts\Comentable;

echo "=== PRUEBA DE VERIFICACIÓN: Tarea Semana 2 ===" . PHP_EOL;
$pasadas = 0; $total = 0;
function verificar(string $d, bool $c): void {
    global $pasadas, $total; $total++;
    if ($c) { $pasadas++; echo "PASÓ: $d" . PHP_EOL; }
    else { echo "FALLÓ: $d" . PHP_EOL; }
}

// 1. Herencia
$urgente = new TareaUrgente("Prueba", "2026-12-01");
verificar("TareaUrgente ES-UNA Tarea (herencia)", $urgente instanceof Tarea);

$recurrente = new TareaRecurrente("Prueba 2", "diaria");
verificar("TareaRecurrente ES-UNA Tarea (herencia)", $recurrente instanceof Tarea);

verificar("parent::__construct() inicializó el título heredado", $urgente->getTitulo() === "Prueba");

// 2. Interfaces
verificar("TareaUrgente implementa Notificable", $urgente instanceof Notificable);
verificar("TareaRecurrente implementa Notificable", $recurrente instanceof Notificable);
verificar("Tarea implementa Comentable", $urgente instanceof Comentable);

// 3. Comportamiento polimórfico
verificar(
    "notificar() difiere entre TareaUrgente y TareaRecurrente (polimorfismo)",
    $urgente->notificar() !== $recurrente->notificar()
);
verificar(
    "TareaRecurrente notifica en función de su frecuencia",
    $recurrente->notificar() === "Recordatorio diario: pendiente 'Prueba 2'"
);

// 4. Composición: el Tablero TIENE columnas, la Columna TIENE tareas
$tablero = new Tablero("Tablero de prueba");
verificar("El tablero nace sin tareas", $tablero->contarTareasTotales() === 0);

$tablero->agregarTarea(new Tarea("Tarea A"));
$tablero->agregarTarea($urgente, 'En progreso');
verificar("contarTareasTotales() suma las tareas de todas las columnas", $tablero->contarTareasTotales() === 2);
verificar("La tarea se ubicó en la columna indicada", $tablero->getColumna('En progreso')->contarTareas() === 1);
verificar("Tablero NO es una Columna (composición, no herencia)", !($tablero instanceof Columna));

// 5. Límite de trabajo en progreso
$columna = new Columna("Revisión", 2);
$columna->agregarTarea(new Tarea("Tarea 1"));
verificar("Con 1 de 2 tareas, estaLlena() es false", $columna->estaLlena() === false);

$columna->agregarTarea(new Tarea("Tarea 2"));
verificar("Con 2 de 2 tareas, estaLlena() es true", $columna->estaLlena() === true);

$excepcionWip = false;
try {
    $columna->agregarTarea(new Tarea("Tarea 3"));
} catch (\RuntimeException $e) {
    $excepcionWip = true;
}
verificar("La columna rechaza tareas por encima de su límite WIP", $excepcionWip);

// 6. Comentable
$tarea = new Tarea("Tarea comentada");
$tarea->agregarComentario("Primer comentario");
$tarea->agregarComentario("Segundo comentario");
verificar("getComentarios() conserva los comentarios en orden",
    $tarea->getComentarios() === ["Primer comentario", "Segundo comentario"]);
verificar("contarComentarios() retorna 2", $tarea->contarComentarios() === 2);

// 7. Validaciones de los constructores
$excepcionTitulo = false;
try {
    new Tarea("   ");
} catch (\InvalidArgumentException $e) {
    $excepcionTitulo = true;
}
verificar("El constructor de Tarea rechaza títulos vacíos", $excepcionTitulo);

$excepcionFrecuencia = false;
try {
    new TareaRecurrente("Tarea X", "quincenal");
} catch (\InvalidArgumentException $e) {
    $excepcionFrecuencia = true;
}
verificar("TareaRecurrente rechaza frecuencias no permitidas", $excepcionFrecuencia);

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
