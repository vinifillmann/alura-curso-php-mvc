<?php

use Alura\Cursos\Controller\{Exclusao, FormularioEdicao, ListarCursos, FormularioInsercao, Persistencia};

$rotas = [
    "/listar-cursos" => ListarCursos::class,
    "/novo-curso" => FormularioInsercao::class,
    "/salvar-curso" => Persistencia::class,
    "/excluir-cursos" => Exclusao::class,
    "/alterar-cursos" => FormularioEdicao::class,
];

return $rotas;