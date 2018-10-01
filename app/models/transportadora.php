<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 13/08/2018
 * Time: 13:46
 */

class transportadora
{
    public $razao_social;
    public $cnpj;
    public $cod_usuario;

    public function __construct( $razao_social, $cnpj, $cod_usuario = null){

        $this->razao_social = $razao_social;
        $this->cnpj = $cnpj;
        $this->cod_usuario = $cod_usuario;
    }

}

