<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\{FormularioInsercao, ListarCursos};

switch ($_SERVER["PATH_INFO"]) {
    case "/listar-cursos":
        $contolador = new ListarCursos();
        $contolador->processaRequisicao();
        break;

    case "/novo-curso":
        $contolador = new FormularioInsercao();
        $contolador->processaRequisicao();
        break;
    
    default:
        echo "Erro 404";
        break;
}