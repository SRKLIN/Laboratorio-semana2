<?php

class TareaBuggy
{
    private string $titulo; // error 1: debería ser protected

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
    }
}

class TareaUrgenteBuggy extends TareaBuggy
{
    public string $fechaLimite;

    public function __construct(string $titulo, string $fechaLimite)
    {
        // error 2: falta parent::__construct($titulo);
        $this->fechaLimite = $fechaLimite;
        $this->titulo = $titulo;
    }
}

$u = new TareaUrgenteBuggy("Entregar Lab I", "2026-08-11");

echo "Resultado de var_dump() sobre el objeto con errores:" . PHP_EOL;
var_dump($u);
