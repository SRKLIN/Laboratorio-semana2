<?php
require __DIR__ . '/ejercicio_B1_empleados.php';

echo PHP_EOL . "=== PRUEBA DE VERIFICACIÓN: Ejercicio B.1 ===" . PHP_EOL;
$pasadas = 0; $total = 0;
function verificar(string $d, bool $c): void {
    global $pasadas, $total; $total++;
    if ($c) { $pasadas++; echo "PASÓ: $d" . PHP_EOL; }
    else { echo "FALLÓ: $d" . PHP_EOL; }
}

$ana = new Empleado("Ana", 500);
verificar("El empleado base calcula el pago igual al salario base", $ana->calcularPago() === 500.0);

$kevin = new EmpleadoComision("Kevin", 500, 150);
verificar("EmpleadoComision suma salario base y comisión", $kevin->calcularPago() === 650.0);

verificar("EmpleadoComision ES-UN Empleado (herencia)", $kevin instanceof Empleado);

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
