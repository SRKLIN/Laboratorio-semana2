<?php
require __DIR__ . '/vendor/autoload.php';

use App\Models\ClienteVIP;
use App\Contracts\Facturable;

echo PHP_EOL . "=== PRUEBA DE VERIFICACIÓN: Ejercicio B.5 ===" . PHP_EOL;
$pasadas = 0; $total = 0;
function verificar(string $d, bool $c): void {
    global $pasadas, $total; $total++;
    if ($c) { $pasadas++; echo "PASÓ: $d" . PHP_EOL; }
    else { echo "FALLÓ: $d" . PHP_EOL; }
}

$cliente = new ClienteVIP("Ana Beatriz Flores", "ana@correo.com");

verificar("ClienteVIP implementa Facturable", $cliente instanceof Facturable);
verificar(
    "emitirFactura(100) aplica el 10% de descuento correctamente",
    $cliente->emitirFactura(100) === "Factura para Ana Beatriz Flores: \$90 (10% descuento VIP aplicado)"
);

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
