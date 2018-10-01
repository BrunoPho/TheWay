<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 13/07/18
 * Time: 13:33
 */

class Montadora {

    public $cod_montadora;
    public $nome;

    public function __construct($nome, $cod_montadora = null)
    {
        $this->cod_montadora = $cod_montadora;
        $this->nome = $nome;
    }
}