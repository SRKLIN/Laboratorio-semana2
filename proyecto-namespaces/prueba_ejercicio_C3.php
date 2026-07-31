<?php
require __DIR__ . '/funciones_C3.php';
use App\Models\Tarea;

echo PHP_EOL . "=== PRUEBA DE VERIFICACIÓN: Ejercicio C.3 ===" . PHP_EOL;
$pasadas = 0; $total = 0;
function verificar(string $d, bool $c): void {
    global $pasadas, $total; $total++;
    if ($c) { $pasadas++; echo "PASÓ: $d" . PHP_EOL; }
    else { echo "FALLÓ: $d" . PHP_EOL; }
}

$t1 = new Tarea("Tarea 1");
$t2 = new Tarea("Tarea 2");

comentarATodas([$t1, $t2], "Revisado por el equipo");

verificar("Tarea implementa Comentable", $t1 instanceof \App\Contracts\Comentable);
verificar("t1 recibió el comentario correspondiente", $t1->getComentarios() === ["Revisado por el equipo"]);
verificar("t2 también recibió el comentario correspondiente", $t2->getComentarios() === ["Revisado por el equipo"]);

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
