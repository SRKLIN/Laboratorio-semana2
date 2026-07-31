<?php
require __DIR__ . '/ejercicio_A2_libro.php';

echo PHP_EOL . "=== PRUEBA DE VERIFICACIÓN: Ejercicio A.2 ===" . PHP_EOL;
$pasadas = 0; $total = 0;
function verificar(string $d, bool $c): void {
    global $pasadas, $total; $total++;
    if ($c) { $pasadas++; echo "PASÓ: $d" . PHP_EOL; }
    else { echo "FALLÓ: $d" . PHP_EOL; }
}

$libro = new Libro("Refactoring");

verificar("getTituloLibro() retorna el título correcto", $libro->getTituloLibro() === "Refactoring");
verificar("El libro nace disponible (true)", $libro->getDisponible() === true);

$libro->prestar();
verificar("prestar() modifica disponible a false", $libro->getDisponible() === false);

$reflexion = new ReflectionClass($libro);
verificar("\$tituloLibro permanece como private", $reflexion->getProperty('tituloLibro')->isPrivate());
verificar("\$disponible permanece como private", $reflexion->getProperty('disponible')->isPrivate());

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
