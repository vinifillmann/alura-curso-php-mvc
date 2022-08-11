<?php

namespace Alura\Cursos\Controller;

class Deslogar implements InterfaceController
{
    public function processaRequisicao(): void
    {
        session_destroy();
        header("Location: /");
    }
}