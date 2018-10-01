<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 13/07/18
 * Time: 13:32
 */

class Modelo {

    public $cod_modelo;
    public $nome;
    public $cod_montadora;

    public function __construct($cod_modelo, $nome, $cod_montadora) {

        $this->cod_modelo    = $cod_modelo;
        $this->nome          = $nome;
        $this->cod_montadora = $cod_montadora;
    }

}