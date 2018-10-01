<?php

require_once "conexao.php";

class usuario
{
    public $id; //chave primaria no BD
    public $nome;
    public $sobrenome;
    public $email;
    public $telefone;
    public $login;
    public $senha;

    public function __construct($nome, $sobrenome, $email, $telefone, $login, $senha, $id=null)
    {

        $this->id        = $id;
        $this->nome      = $nome;
        $this->sobrenome = $sobrenome;
        $this->email     = $email;
        $this->telefone  = $telefone;
        $this->login     = $login;
        $this->senha     = $senha;
    }
}