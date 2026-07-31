<?php
require __DIR__ . '/ejercicio_A4_cuentabancaria.php';

echo PHP_EOL . "=== PRUEBA DE VERIFICACIÓN: Ejercicio A.4 ===" . PHP_EOL;
$pasadas = 0; $total = 0;
function verificar(string $d, bool $c): void {
    global $pasadas, $total; $total++;
    if ($c) { $pasadas++; echo "PASÓ: $d" . PHP_EOL; }
    else { echo "FALLÓ: $d" . PHP_EOL; }
}

$c = new CuentaBancaria();
verificar("El saldo inicial es 0", $c->getSaldo() === 0.0);

$c->depositar(150.50);
verificar("Después de depositar 150.50, el saldo es 150.50", $c->getSaldo() === 150.50);

$excepcionLanzada = false;
try {
    $c->depositar(-20);
} catch (\InvalidArgumentException $e) {
    $excepcionLanzada = true;
}
verificar("depositar() rechaza montos negativos o cero mediante una excepción", $excepcionLanzada);

verificar("El saldo no se modifica tras el intento inválido", $c->getSaldo() === 150.50);

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
