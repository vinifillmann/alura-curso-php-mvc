<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorDeHTML;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListarCursos implements RequestHandlerInterface
{
    use RenderizadorDeHTML;

    private $repositorioDeCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }


    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(200, [], $this->renderizaHtml("cursos/listar-cursos.php", ["titulo" => "Lista de Cursos", "cursos" => $this->repositorioDeCursos->findAll()]));
    }
}