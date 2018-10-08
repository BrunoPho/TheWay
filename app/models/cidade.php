<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 08/10/2018
 * Time: 14:17
 */

class cidade{

    public $nome;
    public $cod_cidade;

    public function __construct($nome, $cod_cidade = null){

        $this->nome          = $nome;
        $this->cod_cidade    = $cod_cidade;

    }
}