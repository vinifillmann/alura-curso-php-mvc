<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;

class Exclusao implements InterfaceController
{
    use FlashMessageTrait;

    private EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        if ($id === false || $id === NULL) {
            $this->defineMensagem("danger", "Curso inexistente!");
            header("Location: /");
            return;
        }

        $curso = $this->entityManager->getReference(Curso::class, $id);
        $this->defineMensagem("success", "Curso: {$curso->getDescricao()} excluido com sucesso!");
        $this->entityManager->remove($curso);
        $this->entityManager->flush();
        header("Location: /");
    }
}