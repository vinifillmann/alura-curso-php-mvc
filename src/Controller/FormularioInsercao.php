<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorDeHTML;

class FormularioInsercao implements InterfaceController
{
    use RenderizadorDeHTML;

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml("cursos/formulario.php", ["titulo" => "Novo Curso"]);
    }
}