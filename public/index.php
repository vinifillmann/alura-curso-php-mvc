<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\{FormularioInsercao, ListarCursos, Persistencia};

if (isset($_SERVER["PATH_INFO"])) {
    switch ($_SERVER["PATH_INFO"]) {
        case "/listar-cursos":
            $contolador = new ListarCursos();
            $contolador->processaRequisicao();
            break;

        case "/novo-curso":
            $contolador = new FormularioInsercao();
            $contolador->processaRequisicao();
            break;

        case "/salvar-curso":
            $contolador = new Persistencia();
            $contolador->processaRequisicao();
            break;
        
        default:
            echo "Erro 404";
            break;
    }
} else {
    header("Location: /listar-cursos");
    die();
}