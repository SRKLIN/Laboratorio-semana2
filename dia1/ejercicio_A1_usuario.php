<?php

// Ejercicio A.1 — Clase Usuario (mismo patrón del Ejemplo A.1)
class Usuario
{
    public string $nombre;
    public bool $activo = true; // todo usuario nace activo

    public function desactivar(): void
    {
        $this->activo = false;
    }
}

$usuario1 = new Usuario();
$usuario1->nombre = "Ana Beatriz Flores";

$usuario2 = new Usuario();
$usuario2->nombre = "Kevin Martínez";

echo "Antes de desactivar:" . PHP_EOL;
echo "Usuario 1 -> {$usuario1->nombre} | activo: " . var_export($usuario1->activo, true) . PHP_EOL;
echo "Usuario 2 -> {$usuario2->nombre} | activo: " . var_export($usuario2->activo, true) . PHP_EOL;

// solo se desactiva el primero: cada objeto conserva su propio estado
$usuario1->desactivar();

echo PHP_EOL . "Después de \$usuario1->desactivar():" . PHP_EOL;
echo "Usuario 1 -> {$usuario1->nombre} | activo: " . var_export($usuario1->activo, true) . PHP_EOL;
echo "Usuario 2 -> {$usuario2->nombre} | activo: " . var_export($usuario2->activo, true) . PHP_EOL;
