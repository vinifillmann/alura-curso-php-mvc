<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\{FormularioInsercao, ListarCursos, Persistencia};

$caminho = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : "";
$rotas = require __DIR__ . "/../config/routes.php";

if (!array_key_exists($caminho, $rotas)) {
    if (trim($caminho) === "") {
        header("Location: /listar-cursos");
    } else {
        http_response_code(404);
    }
    die;
}

$classeControladora = $rotas[$caminho];
$contolador = new $classeControladora();
$contolador->processaRequisicao();