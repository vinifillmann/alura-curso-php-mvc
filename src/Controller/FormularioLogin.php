<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorDeHTML;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioLogin implements RequestHandlerInterface
{
    use RenderizadorDeHTML;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(200, [], $this->renderizaHtml("login/formulario.php", ["titulo" => "Login"]));
    }
}