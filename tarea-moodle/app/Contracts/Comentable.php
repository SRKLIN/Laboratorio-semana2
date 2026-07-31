<?php

namespace App\Contracts;

/**
 * Contrato para todo objeto sobre el cual se pueden registrar comentarios.
 */
interface Comentable
{
    public function agregarComentario(string $comentario): void;

    public function getComentarios(): array;
}
