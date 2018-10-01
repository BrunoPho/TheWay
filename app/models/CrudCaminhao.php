<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 13/07/18
 * Time: 13:29
 */

class CrudCaminhao {

    //CONEXÃO COM O BANCO
    public function __construct(){

        $this->conexao = Conexao::getConexao();

        return $this;
    }


    public function getMontadoras() {

        $consulta = 'select * from montadora order by name';
        $resultado = $this->conexao->query($consulta);
        $montadoras = $consulta->fetchAll(PDO::FETCH_ASSOC);

        return $montadoras;
    }
}