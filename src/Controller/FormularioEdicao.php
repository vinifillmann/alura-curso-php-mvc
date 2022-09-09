<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorDeHTML;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEdicao implements RequestHandlerInterface
{
    use RenderizadorDeHTML;

    private $repositorioCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioCursos = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        if ($id === NULL || $id === false) {
            return new Response(302, ["Location" => "/"]);
        }

        return new Response(200, [], $this->renderizaHtml("cursos/formulario.php", ["titulo" => "Editar Curso", "curso" => $this->repositorioCursos->find($id)]));
    }
}