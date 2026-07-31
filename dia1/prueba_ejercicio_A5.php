<?php
require __DIR__ . '/ejercicio_A5_producto_descuento.php';

echo PHP_EOL . "=== PRUEBA DE VERIFICACIÓN: Ejercicio A.5 ===" . PHP_EOL;
$pasadas = 0; $total = 0;
function verificar(string $d, bool $c): void {
    global $pasadas, $total; $total++;
    if ($c) { $pasadas++; echo "PASÓ: $d" . PHP_EOL; }
    else { echo "FALLÓ: $d" . PHP_EOL; }
}

$prod = new Producto("Casco", 100.0);
$prod->aplicarDescuento(20);
verificar("aplicarDescuento(20) deja el precio en 80.0", round($prod->getPrecio(), 2) === 80.0);

$excepcion = false;
try {
    $prod->aplicarDescuento(150);
} catch (\InvalidArgumentException $e) {
    $excepcion = true;
}
verificar("aplicarDescuento(150) lanza una excepción (fuera de rango)", $excepcion);

$excepcion2 = false;
try {
    $prod->aplicarDescuento(-5);
} catch (\InvalidArgumentException $e) {
    $excepcion2 = true;
}
verificar("aplicarDescuento(-5) también lanza una excepción", $excepcion2);

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
