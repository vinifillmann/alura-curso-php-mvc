<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao extends Controller implements InterfaceController
{
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml("cursos/formulario.php", ["titulo" => "Novo Curso"]);
    }
}