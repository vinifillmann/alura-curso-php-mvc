<?php

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

$classeControladora = $rotas[$caminho];
$contolador = new $classeControladora();
$contolador->processaRequisicao();