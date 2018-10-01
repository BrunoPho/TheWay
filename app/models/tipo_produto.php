<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 15/08/18
 * Time: 14:59
 */

class tipo_produto {

    public $cod_modelo;
    public $nome;
    public $cod_montadora;

    public function __construct($cod_modelo, $nome, $cod_montadora) {

        $this->cod_modelo    = $cod_modelo;
        $this->nome          = $nome;
        $this->cod_montadora = $cod_montadora;
    }

 }
