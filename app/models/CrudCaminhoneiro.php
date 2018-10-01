<?php

 require_once "conexao.php";

 require_once "caminhoneiro.php";

class Crudcaminhoneiro{

    private $conexao;
    public  $caminhoneiro;

    //CONEXÃO COM O BANCO
    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }

    //Cadastra o usuario caminhoneiro
    public function salvar (caminhoneiro $caminhoneiro){
        /*var_dump($caminhoneiro);*/
        $sql = "INSERT INTO caminhoneiro (nome, email, telefone, senha, rg, cpf, num_antt, num_cnh, categoria_cnh)
                VALUES ('$caminhoneiro->nome', '$caminhoneiro->email', '$caminhoneiro->telefone', '$caminhoneiro->senha', '$caminhoneiro->rg', '$caminhoneiro->cpf', '$caminhoneiro->num_antt', '$caminhoneiro->num_cnh', '$caminhoneiro->categoria_cnh')";
        /*$sql = 'INSERT INTO caminhoneiro (nome, email, telefone, senha, rg, cpf, num_antt, num_cnh, categoria_cnh) VALUES ('$caminhoneiro->nome', '$caminhoneiro->email', '$caminhoneiro->telefone', '$caminhoneiro->senha', '$caminhoneiro->rg', '$caminhoneiro->cpf', '$caminhoneiro->num_antt', '$caminhoneiro->num_cnh', '$caminhoneiro->categoria_cnh')';*/

        $this->conexao->exec($sql);
    }

    //Busca usuario caminhoneiro
    public function     getusuario (int $cod_caminhoneiro){

        // Substitui o $consultausuarios por $consulta
        $consulta->conexao->query("SELECT * FROM caminhoneiro WHERE cod_caminhoneiro = $cod_caminhoneiro");
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC); //SEMELHANTES JSON ENCODE E DECODE

        return new usuario($usuario['nome'], $usuario['email'], $usuario['telefone'], $usuario['senha'], $usuario['rg'], $usuario['cpf'], $usuario['num_cnh']);
    }

    public function getusuarios (){

        $consulta = $this->conexao->query("SELECT * FROM caminhoneiro");
        $arrayusuarios = $consulta->fetchAll($this->caminhoneiro);

    //Fabrica de caminhoneiro
        $listausuario = [];

        foreach ($arrayusuarios as $usuario ){

            $listausuario[] = new usuario($usuario['nome'], $usuario['email'], $usuario['telefone'], $usuario['senha'], $usuario['rg'], $usuario['cpf'], $usuario['num_cnh']);

        }

        return $this->caminhoneiro;
    }

    //Exclui o usuario
    public function excluirusuario ($x){

        $this->conexao->exec("DELETE from caminhoneiro where cod_caminhoneiro = $x");
}

    //Edita as informações do usuario
    public function editar ($nome, $email, $telefone, $senha, $rg, $cpf, $num_cnh){

        $this->conexao->exec("UPDATE caminhoneiro SET nome = $nome, email = $email, telefone = $telefone, senha = $senha, rg = $rg, cpf = $cpf, num_cnh = $num_cnh WHERE caminhoneiro.cod_caminhoneiro = $id; ");
    }

    //login
    public function login ($usuario, $senha, $cod_caminheiro){

        // Substitui o $consultausuarios por $consulta
        $consulta->conexao->query("SELECT * FROM caminhoneiro WHERE cod_caminhoneiro = $cod_caminheiro");
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC); //SEMELHANTES JSON ENCODE E DECODE

        return new usuario($usuario['nome'], $usuario['senha'], $usuario['telefone'], $usuario['senha'], $usuario['rg'], $usuario['cpf'], $usuario['num_cnh']);

    }

}
