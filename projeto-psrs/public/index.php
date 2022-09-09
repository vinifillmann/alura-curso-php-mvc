<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

require __DIR__ . '/../vendor/autoload.php';

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

session_start();

$eRotaDeLogin = stripos($caminho, "login");
if (!isset($_SESSION["logado"]) && $eRotaDeLogin === false) {
    header("Location: /login");
    die();
}

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory,
    $psr17Factory,
    $psr17Factory,
    $psr17Factory
);

$request = $creator->fromGlobals();

$classeControladora = $rotas[$caminho];
$contolador = new $classeControladora();
$resposta = $contolador->handle($request);

foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf("%s: %s", $name, $value), false);
    }
}

echo $resposta->getBody();
