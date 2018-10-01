<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 13/07/18
 * Time: 13:35
 */

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

require '../models/CrudMontadora.php';


switch ($acao){
    case    'index':
        //vai chamar a funcao do crud que lista todas as montadoras
        $crud = new CrudMontadora();
        $montadoras = $crud->getMontadoras();

        //chamar a view que exibe a lista de montadoras
        include '../view/indexMontadora.php';
        break;

    case 'exibir':


        break;
}