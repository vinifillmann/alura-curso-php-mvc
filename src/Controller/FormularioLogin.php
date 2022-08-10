<?php

namespace Alura\Cursos\Controller;

class FormularioLogin extends Controller implements InterfaceController
{
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml("login/formulario.php", ["titulo" => "Login"]);
    }
}