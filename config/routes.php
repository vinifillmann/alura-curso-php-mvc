<?php

use Alura\Cursos\Controller\{Exclusao, FormularioEdicao, ListarCursos, FormularioInsercao, FormularioLogin, Persistencia, RealizarLogin};

$rotas = [
    "/listar-cursos" => ListarCursos::class,
    "/novo-curso" => FormularioInsercao::class,
    "/salvar-curso" => Persistencia::class,
    "/excluir-cursos" => Exclusao::class,
    "/alterar-cursos" => FormularioEdicao::class,
    "/login" => FormularioLogin::class,
    "/realiza-login" => RealizarLogin::class,
];

return $rotas;