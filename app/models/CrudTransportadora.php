<?php

require_once "conexao.php";

require_once "transportadora.php";

class Crudtransportadora{

    private $conexao;
    public  $transportadora;

    //CONEXÃO COM O BANCO
    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }

    //Cadastra o usuario transportadora
    public function salvar (transportadora $transportadora){
        var_dump($transportadora);
        $sql = "INSERT INTO transportadora (cnpj, razao_social) 
                VALUES ('$transportadora->cnpj', '$transportadora->razao_social')";

        $this->conexao->exec($sql);
    }

    //Busca usuario transportadora
    public function getusuario (int $cod_usuario){

        $consultausuario->conexao->query("SELECT * FROM transportadora WHERE cod_usuario = $cod_usuario");
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC); //SEMELHANTES JSON ENCODE E DECODE

        return new transportadora($usuario['cnpj'], $usuario['razao_social']);
    }

    public function getusuarios (){

        $consulta = $this->conexao->query("SELECT * FROM transportadora");
        $arrayusuarios = $consulta->fetchAll($this->transportadora);

        //Fabrica de transportadora
        $listausuario = [];

        foreach ($arrayusuarios as $usuario ){

            $listausuario[] = new usuario($usuario['nome'], $usuario['email'], $usuario['telefone'], $usuario['senha'], $usuario['rg'], $usuario['cpf'], $usuario['num_cnh']);

        }

        return $this->transportadora;
    }

    //Exclui o usuario
    public function excluirusuario ($x){

        $this->conexao->exec("DELETE from transportadora where cod_usuario = $x");
    }

    //Edita as informações do usuario
    public function editar ($cnpj, $razao_social){

        $this->conexao->exec("UPDATE transportadora SET cnpj = $cnpj, razao_social = $razao_social WHERE transportadora.cod_usuario = $id; ");
    }

    //login
    public function login ($usuario, $senha, $cod_usuario){

        $consultausuarios->conexao->query("SELECT * FROM transportadora WHERE cod_usuario = $cod_usuario");
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC); //SEMELHANTES JSON ENCODE E DECODE

        return new usuario($usuario['nome'], $usuario['email'], $usuario['telefone'], $usuario['senha'], $usuario['rg'], $usuario['cpf'], $usuario['num_cnh']);

    }

}
