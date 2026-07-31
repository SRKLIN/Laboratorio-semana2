<?php

namespace App\Contracts;

interface Comentable
{
    public function agregarComentario(string $comentario): void;

    public function getComentarios(): array;
}
