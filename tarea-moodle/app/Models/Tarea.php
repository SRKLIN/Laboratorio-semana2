<?php

namespace App\Models;

use App\Contracts\Comentable;

/**
 * Clase base del dominio: toda tarea del tablero admite comentarios.
 */
class Tarea implements Comentable
{
    // protected para que las clases hijas puedan leer el título
    protected string $titulo;
    protected bool $completada = false;
    private array $comentarios = [];

    public function __construct(string $titulo)
    {
        if (trim($titulo) === '') {
            throw new \InvalidArgumentException("El título de la tarea no puede estar vacío.");
        }
        $this->titulo = $titulo;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function estaCompletada(): bool
    {
        return $this->completada;
    }

    public function marcarCompletada(): void
    {
        $this->completada = true;
    }

    public function agregarComentario(string $comentario): void
    {
        $this->comentarios[] = $comentario;
    }

    public function getComentarios(): array
    {
        return $this->comentarios;
    }

    public function contarComentarios(): int
    {
        return count($this->comentarios);
    }
}
