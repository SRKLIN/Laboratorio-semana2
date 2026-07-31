<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Contracts\Comentable;

// Ejercicio C.3 — función polimórfica: solo comenta lo que cumple el contrato
function comentarATodas(array $tareas, string $comentario): void
{
    foreach ($tareas as $tarea) {
        if ($tarea instanceof Comentable) {
            $tarea->agregarComentario($comentario);
        }
    }
}
