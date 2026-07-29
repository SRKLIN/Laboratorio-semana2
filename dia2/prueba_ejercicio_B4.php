<?php

require_once __DIR__ . '/ejercicio_B4_imprimible.php';

echo "--- Iniciando Pruebas B4---" . PHP_EOL;

#instancias de prueba
$factura = new Factura("F001", 150.00);
$recibo = new Recibo("Inscripción ciclo 02-2026", 75.50);

#Verificación 
if ($factura instanceof Imprimible && $recibo instanceof Imprimible) {
    echo "Ambas clases implementan la interfaz Imprimible." . PHP_EOL;
} else {
    echo "Alguna clase no está implementando la interfaz Imprimible." . PHP_EOL;
}

echo PHP_EOL . "--- Salida de impresión ---" . PHP_EOL;
procesarImpresion($factura);
procesarImpresion($recibo);