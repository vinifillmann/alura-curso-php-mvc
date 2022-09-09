<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistencia implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $descricao = trim(filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRING));
        $curso = new Curso();
        $curso->setDescricao($descricao);

        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        $tipo = "success"; 
        if ($id !== NULL && $id !== false) {
            $curso->setId($id);
            $this->entityManager->merge($curso);
            $this->defineMensagem($tipo, "Curso {$curso->getDescricao()} atualizado com sucesso!");
        } else {
            $this->entityManager->persist($curso);
            $this->defineMensagem($tipo, "Curso: {$curso->getDescricao()} inserido com sucesso!");
        }
        $this->entityManager->flush();
        return new Response(302, ["Location" => "/"]);
    }
}