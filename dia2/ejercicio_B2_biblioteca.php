<?php

// Ejercicio B.2 — Composición: una Biblioteca TIENE libros (no ES un libro)
class Libro
{
    private string $titulo;

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }
}

class Biblioteca
{
    private array $libros = [];

    public function agregarLibro(Libro $libro): void
    {
        $this->libros[] = $libro;
    }

    public function contarLibros(): int
    {
        return count($this->libros);
    }

    public function listarTitulos(): array
    {
        return array_map(fn (Libro $l) => $l->getTitulo(), $this->libros);
    }
}

$biblioteca = new Biblioteca();
$biblioteca->agregarLibro(new Libro("Clean Code"));
$biblioteca->agregarLibro(new Libro("Refactoring"));
$biblioteca->agregarLibro(new Libro("El Quijote"));

echo "Biblioteca tiene " . $biblioteca->contarLibros() . " libro(s): " . implode(", ", $biblioteca->listarTitulos()) . PHP_EOL;
