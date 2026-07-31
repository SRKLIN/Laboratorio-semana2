<?php

namespace App\Models;

use App\Contracts\Comentable;

class Tarea implements Comentable
{
    protected string $titulo;
    protected bool $completada = false;
    private array $comentarios = [];

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function marcarCompletada(): void
    {
        $this->completada = true;
    }

    // Ejercicio C.3 — cumplimiento del contrato Comentable
    public function agregarComentario(string $comentario): void
    {
        $this->comentarios[] = $comentario;
    }

    public function getComentarios(): array
    {
        return $this->comentarios;
    }
}
