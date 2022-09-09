<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLogin implements RequestHandlerInterface
{

    use FlashMessageTrait;

    private $repositorioDeUsuarios;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        
        if ($email === NULL || $email === false) {
            $this->defineMensagem("danger", "O E-mail digitado não é um E-mail válido");
            return new Response(302, ["Location" => "/login"]);
        }

        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

        $usuario = $this->repositorioDeUsuarios->findOneBy(["email" => $email]);

        if (!$usuario || !$usuario->senhaEstaCorreta($senha)) {
            $this->defineMensagem("danger", "E-mail ou senha inválidos");
            return new Response(302, ["Location" => "/login"]);
        }
        
        $_SESSION["logado"] = true;

        return new Response(302, ["Location" => "/listar-cursos"]);
    }
}