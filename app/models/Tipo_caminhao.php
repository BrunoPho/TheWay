<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 13/07/18
 * Time: 13:32
 */

class Tipo_caminhao{

    public $cod_tipo;
    public $descricao;

    public function __construct($descricao, $cod_tipo = null)
    {
        $this->cod_tipo = $cod_tipo;
        $this->descricao = $descricao;
    }
}
