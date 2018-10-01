<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 15/08/18
 * Time: 14:35
 */

class servico
{

    public $numero_seguro;
    public $data_entrega;
    public $cod_servico;
    public $data_cadastro;
    public $quantidade;
    public $data_retirada;
    public $data_retirada_prev;
    public $data_entrega_prev;
    public $cod_status;
    public $cod_cidade;
    public $cod_produto;

    public function __construct($numero_seguro, $data_entrega, $cod_servico, $data_cadastro, $quantidade, $data_retirada, $data_retirada_prev, $data_entrega_prev, $cod_status, $cod_cidade, $cod_produto) {

        $this->numero_seguro      = $numero_seguro;
        $this->data_entrega       = $data_entrega;
        $this->cod_servico        = $cod_servico;
        $this->data_cadastro      = $data_cadastro;
        $this->quantidade         = $quantidade;
        $this->data_retirada      = $data_retirada;
        $this->data_retirada_prev = $data_retirada_prev;
        $this->data_entrega_prev  = $data_entrega_prev;
        $this->cod_status         = $cod_status;
        $this->cod_cidade         = $cod_cidade;
        $this->cod_produto        = $cod_produto;
    }
  }