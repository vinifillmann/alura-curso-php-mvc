<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Exclusao implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        if ($id === false || $id === NULL) {
            $this->defineMensagem("danger", "Curso inexistente!");
            return new Response(302, ["Location" => "/"]);
        }

        $curso = $this->entityManager->getReference(Curso::class, $id);
        $this->defineMensagem("success", "Curso: {$curso->getDescricao()} excluido com sucesso!");
        $this->entityManager->remove($curso);
        $this->entityManager->flush();
        return new Response(302, ["Location" => "/"]);
    }
}