<?php
require __DIR__ . '/vendor/autoload.php';
use App\Models\Columna;
use App\Models\Tablero;
use App\Models\Tarea;

echo PHP_EOL . "=== PRUEBA DE VERIFICACIÓN: Ejercicio C.1 ===" . PHP_EOL;
$pasadas = 0; $total = 0;
function verificar(string $d, bool $c): void {
    global $pasadas, $total; $total++;
    if ($c) { $pasadas++; echo "PASÓ: $d" . PHP_EOL; }
    else { echo "FALLÓ: $d" . PHP_EOL; }
}

$columna = new Columna("Por hacer", 2);
verificar("La columna nace vacía (contarTareas() === 0)", $columna->contarTareas() === 0);

$columna->agregarTarea(new Tarea("Tarea A"));
verificar("Con 1 de 2 tareas, estaLlena() debe ser false", $columna->estaLlena() === false);

$columna->agregarTarea(new Tarea("Tarea B"));
verificar("Con 2 de 2 tareas, estaLlena() debe ser true", $columna->estaLlena() === true);

$tablero = new Tablero();
$tablero->agregarColumna($columna);
verificar("El tablero contabiliza correctamente las tareas totales", $tablero->contarTareasTotales() === 2);

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
