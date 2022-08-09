<?php

use Alura\Cursos\Controller\{ListarCursos, FormularioInsercao, Persistencia};

$rotas = [
    "/listar-cursos" => ListarCursos::class,
    "/novo-curso" => FormularioInsercao::class,
    "/salvar-curso" => Persistencia::class,
];

return $rotas;