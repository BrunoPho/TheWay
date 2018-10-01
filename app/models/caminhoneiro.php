<?php

require_once "conexao.php";

class caminhoneiro{

    public $cod_usuario; //chave primaria no BD
    public $nome;
    public $email;
    public $telefone;
    public $login;
    public $senha;
    public $rg;
    public $cpf;
    public $num_antt;
    public $num_cnh;
    public $categoria_cnh;

    public function __construct($nome, $email, $telefone, $senha, $rg, $cpf, $num_antt, $num_cnh, $categoria_cnh, $cod_usuario = null){

        $this->nome          = $nome;
        $this->email         = $email;
        $this->telefone      = $telefone;
        $this->senha         = $senha;
        $this->rg            = $rg;
        $this->cpf           = $cpf;
        $this->num_antt      = $num_antt;
        $this->num_cnh       = $num_cnh;
        $this->categoria_cnh = $categoria_cnh;
        $this->cod_usuario   = $cod_usuario;
    }
}