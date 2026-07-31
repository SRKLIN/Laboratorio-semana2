<?php
require __DIR__ . '/ejercicio_B3_persona_estudiante.php';

echo PHP_EOL . "=== PRUEBA DE VERIFICACIÓN: Ejercicio B.3 ===" . PHP_EOL;
$pasadas = 0; $total = 0;
function verificar(string $d, bool $c): void {
    global $pasadas, $total; $total++;
    if ($c) { $pasadas++; echo "PASÓ: $d" . PHP_EOL; }
    else { echo "FALLÓ: $d" . PHP_EOL; }
}

$est = new Estudiante("Kevin Martínez", "2026-ISC-0198");

verificar("getNombre() retorna el nombre correctamente heredado", $est->getNombre() === "Kevin Martínez");
verificar("getCarnet() retorna el número de carné correctamente", $est->getCarnet() === "2026-ISC-0198");

$reflexion = new ReflectionClass('Persona');
verificar("La propiedad \$nombre en Persona es protected (no private)", $reflexion->getProperty('nombre')->isProtected());

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
