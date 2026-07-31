<?php
require __DIR__ . '/ejercicio_A3_vehiculo.php';

echo PHP_EOL . "=== PRUEBA DE VERIFICACIÓN: Ejercicio A.3 ===" . PHP_EOL;
$pasadas = 0; $total = 0;
function verificar(string $d, bool $c): void {
    global $pasadas, $total; $total++;
    if ($c) { $pasadas++; echo "PASÓ: $d" . PHP_EOL; }
    else { echo "FALLÓ: $d" . PHP_EOL; }
}

$v = new Vehiculo("Honda", 2015);

verificar("getMarca() retorna 'Honda'", $v->getMarca() === "Honda");
verificar("getAnio() retorna 2015", $v->getAnio() === 2015);
verificar("antiguedad(2026) calcula 11 años correctamente", $v->antiguedad(2026) === 11);

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
