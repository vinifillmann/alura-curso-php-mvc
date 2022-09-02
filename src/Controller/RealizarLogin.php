<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizarLogin implements InterfaceController
{

    use FlashMessageTrait;

    private $repositorioDeUsuarios;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        
        if ($email === NULL || $email === false) {
            $this->defineMensagem("danger", "O E-mail digitado não é um E-mail válido");
            header("Location: /login");
            return;
        }

        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

        $usuario = $this->repositorioDeUsuarios->findOneBy(["email" => $email]);

        if (!$usuario || !$usuario->senhaEstaCorreta($senha)) {
            $this->defineMensagem("danger", "E-mail ou senha inválidos");
            header("Location: /login");
            return;
        }
        
        $_SESSION["logado"] = true;

        header("Location: /listar-cursos");
    }
}