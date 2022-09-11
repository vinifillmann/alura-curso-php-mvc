<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use DI\Definition\Resolver\ResolverDispatcher;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CursosEmJson implements RequestHandlerInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $cursos = ($this->entityManager->getRepository(Curso::class))->findAll();
        $json = json_encode($cursos);
        return new Response(
            200,
            ["Content-Type" => "application/json"],
            $json
        );
    }
}