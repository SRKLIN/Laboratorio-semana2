<?php

class Persona
{
    #cambiamos a protected en vez de private 
    protected string $nombre;

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }
}

class Estudiante extends Persona
{
    private string $carnet;

    public function __construct(string $nombre, string $carnet)
    {
        #constructor 
        parent::__construct($nombre);
        $this->carnet = $carnet;
    }

    public function getCarnet(): string
    {
        return $this->carnet;
    }
}

#probamos que funcione 
$est = new Estudiante("Kevin Martínez", "2026-ISC-0198");

echo "Estudiante: " . $est->getNombre() . " (carné " . $est->getCarnet() . ")" . PHP_EOL;