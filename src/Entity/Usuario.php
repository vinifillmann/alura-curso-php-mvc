<?php
namespace Alura\Armazenamento\Entity;

use Doctrine\ORM\Mapping\{Entity, Table, Column, Id, GeneratedValue};

#[Entity, Table("usuarios")]
class Usuario
{
    #[Id, GeneratedValue, Column(type: "integer")]
    private $id;
    #[Column(type: "string")]
    private $email;
    #[Column(type: "string")]
    private $senha;

    public function senhaEstaCorreta(string $senhaPura): bool
    {
        return password_verify($senhaPura, $this->senha);
    }
}
