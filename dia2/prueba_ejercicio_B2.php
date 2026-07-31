<?php
require __DIR__ . '/ejercicio_B2_biblioteca.php';

echo PHP_EOL . "=== PRUEBA DE VERIFICACIÓN: Ejercicio B.2 ===" . PHP_EOL;
$pasadas = 0; $total = 0;
function verificar(string $d, bool $c): void {
    global $pasadas, $total; $total++;
    if ($c) { $pasadas++; echo "PASÓ: $d" . PHP_EOL; }
    else { echo "FALLÓ: $d" . PHP_EOL; }
}

$b = new Biblioteca();
verificar("La biblioteca nace vacía (contarLibros() === 0)", $b->contarLibros() === 0);

$b->agregarLibro(new Libro("Clean Code"));
$b->agregarLibro(new Libro("Refactoring"));
verificar("contarLibros() registra 2 tras agregar 2 libros", $b->contarLibros() === 2);
verificar("listarTitulos() retorna los títulos en el orden correspondiente", $b->listarTitulos() === ["Clean Code", "Refactoring"]);

echo PHP_EOL . "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;
