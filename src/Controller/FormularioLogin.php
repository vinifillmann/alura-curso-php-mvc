<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorDeHTML;

class FormularioLogin implements InterfaceController
{
    use RenderizadorDeHTML;

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml("login/formulario.php", ["titulo" => "Login"]);
    }
}