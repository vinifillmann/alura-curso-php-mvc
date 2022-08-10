<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class FormularioEdicao extends Controller implements InterfaceController
{

    private $repositorioCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioCursos = $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        if ($id === NULL || $id === false) {
            header("Location: /");
            return;
        }

        echo $this->renderizaHtml("cursos/formulario.php", ["titulo" => "Editar Curso", "curso" => $this->repositorioCursos->find($id)]);
    }
}