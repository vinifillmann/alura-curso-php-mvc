<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;

class Persistencia implements InterfaceController
{
    private EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $descricao = trim(filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRING));
        $curso = new Curso();
        $curso->setDescricao($descricao);

        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        if ($id !== NULL && $id !== false) {
            $curso->setId($id);
            $this->entityManager->merge($curso);
        } else {
            $this->entityManager->persist($curso);
        }
        $this->entityManager->flush();
        header("Location: /", true, 302);
    }
}