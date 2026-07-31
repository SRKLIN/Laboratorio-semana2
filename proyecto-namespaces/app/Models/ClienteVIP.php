<?php

namespace App\Models;

// sin este use, PHP buscaría App\Models\Facturable y no la encontraría
use App\Contracts\Facturable;

class ClienteVIP extends Cliente implements Facturable
{
    public function emitirFactura(float $monto): string
    {
        $montoConDescuento = $monto * 0.9; // 10% de descuento VIP

        return "Factura para {$this->nombre}: \${$montoConDescuento} (10% descuento VIP aplicado)";
    }
}
