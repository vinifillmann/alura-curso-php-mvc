<?php

namespace Alura\Cursos\Helper;

trait RenderizadorDeHTML
{
    public function renderizaHtml(string $caminhoTemplate, array $dados): string
    {
        extract($dados);
        ob_start();
        require __DIR__ . "/../../view/" . $caminhoTemplate;
        $html = ob_get_clean();
        return $html;
    }
}