<?php

namespace App\Contracts;

/**
 * Contrato para todo objeto capaz de emitir un aviso al usuario.
 */
interface Notificable
{
    public function notificar(): string;
}
