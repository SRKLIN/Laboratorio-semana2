<?php
require __DIR__ . '/ejercicio_B4_imprimible.php';

echo PHP_EOL . "=== PRUEBA DE VERIFICACIÓN: Ejercicio B.4 ===" . PHP_EOL;
$pasadas = 0; $total = 0;
function verificar(string $d, bool $c): void {
    global $pasadas, $total; $total++;
    if ($c) { $pasadas++; echo "PASÓ: $d" . PHP_EOL; }
    else { echo "FALLÓ: $d" . PHP_EOL; }
}

$factura = new Factura("002", 200.0);
$recibo = new Recibo("099", 60.0);

verificar("Factura implementa Imprimible", $factura instanceof Imprimible);
verificar("Recibo implementa Imprimible", $recibo instanceof Imprimible);

ob_start();
imprimirTodos([$factura, $recibo, new stdClass()]);
$salida = ob_get_clean();

verificar("imprimirTodos() imprime la línea correspondiente a la factura", str_contains($salida, "002"));
verificar("imprimirTodos() imprime la línea correspondiente al recibo", str_contains($salida, "099"));
verificar("imprimirTodos() no genera error con un objeto que no implementa Imprimible", true);

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
