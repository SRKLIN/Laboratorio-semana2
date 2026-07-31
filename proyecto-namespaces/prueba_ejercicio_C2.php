<?php
require __DIR__ . '/vendor/autoload.php';
use App\Models\TareaConEtiquetas;

echo PHP_EOL . "=== PRUEBA DE VERIFICACIÓN: Ejercicio C.2 ===" . PHP_EOL;
$pasadas = 0; $total = 0;
function verificar(string $d, bool $c): void {
    global $pasadas, $total; $total++;
    if ($c) { $pasadas++; echo "PASÓ: $d" . PHP_EOL; }
    else { echo "FALLÓ: $d" . PHP_EOL; }
}

$t = new TareaConEtiquetas("Refactorizar login");
$t->agregarEtiqueta("backend");
$t->agregarEtiqueta("urgente");
$t->agregarEtiqueta("backend"); // valor duplicado, no debe repetirse

verificar("getEtiquetas() retorna exactamente 2 etiquetas (sin duplicados)", count($t->getEtiquetas()) === 2);
verificar("Las etiquetas corresponden a ['backend','urgente']", $t->getEtiquetas() === ['backend', 'urgente']);
verificar("TareaConEtiquetas ES-UNA Tarea (herencia)", $t instanceof \App\Models\Tarea);

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
