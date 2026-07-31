<?php

namespace App\Contracts;

interface Facturable
{
    public function emitirFactura(float $monto): string;
}
