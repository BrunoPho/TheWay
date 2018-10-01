<?php
require_once __DIR__.'/../models/conexao.php';
require_once __DIR__.'/../models/caminhoneiro.php';

 class CrudCaminhoneiroM {

    private $conexao;
    public $caminhoneiro;

    function __construct() {

        $this->conexao = Conexao::getConexao();
    }

    public function salvar(caminhoneiro $caminhoneiro) {

        $sql = "INSERT INTO caminhoneiro (nome, email, telefone, senha, rg, cpf, num_antt, num_cnh, categoria_cnh) 
        VALUES ('$caminhoneiro->nome', '$caminhoneiro->email', '$caminhoneiro->telefone', '$caminhoneiro->senha', '$caminhoneiro->rg', '$caminhoneiro->cpf', '$caminhoneiro->num_antt', '$caminhoneiro->num_cnh', '$caminhoneiro->categoria_cnh')";

        $this->conexao->exec($sql);
    }

    public function listar_caminhoneios() {

        $consulta = 'SELECT * FROM caminhoneiro';
        $consulta = $this->conexao->query($consulta);
        $caminhoneiros = $consulta->fetchAll(PDO::FETCH_ASSOC);

        return $caminhoneiros;
    }

    public function listar_caminhoneiro ($id) {

        $consulta = "SELECT * FROM caminhoneiro where cod_usuario = '$id'";
        $consulta = $this->conexao->query($consulta);

        $consulta = $consulta->fetch(PDO::FETCH_ASSOC);

        return $consulta;
    }

    public function excluir_usuario ($id) {

        $sql = "DELETE FROM caminhoneiro where cod_usuario = '$id'";
        $this->conexao->exec($sql);
    }

    public function editar($caminhoneiro) {

        $sql = "UPDATE caminhoneiro set nome = '$caminhoneiro->nome', '$caminhoneiro->email', '$caminhoneiro->telefone', '$caminhoneiro->senha', '$caminhoneiro->rg', '$caminhoneiro->cpf', '$caminhoneiro->num_antt', '$caminhoneiro->num_cnh', '$caminhoneiro->categoria_cnh'";
        $this->conexao->exec($sql);
    }
}