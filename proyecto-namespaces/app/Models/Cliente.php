<?php

namespace App\Models;

class Cliente
{
    protected string $nombre;
    protected string $correo;

    public function __construct(string $nombre, string $correo)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }
}
