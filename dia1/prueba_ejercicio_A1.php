<?php
require __DIR__ . '/ejercicio_A1_usuario.php';

echo PHP_EOL . "=== PRUEBA DE VERIFICACIÓN: Ejercicio A.1 ===" . PHP_EOL;

$pasadas = 0;
$total = 0;

function verificar(string $descripcion, bool $condicion): void
{
    global $pasadas, $total;
    $total++;
    if ($condicion) {
        $pasadas++;
        echo "PASÓ: $descripcion" . PHP_EOL;
    } else {
        echo "FALLÓ: $descripcion" . PHP_EOL;
    }
}

$u = new Usuario();
$u->nombre = "Prueba Test";

verificar("El usuario nace activo por defecto (\$activo == true)", $u->activo === true);

$u->desactivar();
verificar("desactivar() modifica \$activo a false", $u->activo === false);

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
