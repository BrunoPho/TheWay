<?php

////////////////////////////////////////////////////////Importação//////////////////////////////////////////////////////

require_once "../models/caminhoneiro.php";

require_once "../models/CrudCaminhoneiro.php";

//inicia a sessão
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_GET['acao'])) {
    $_GET['acao'] = null;
}

//Substitui Usuario por caminhoneiro em tudo

function cadastrar_caminhoneiro(){
/*    var_dump($_POST);*/
    $caminhoneiro = new caminhoneiro ($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['senha'], $_POST['rg'], $_POST['cpf'], $_POST['num_antt'], $_POST['num_cnh'], $_POST['categoria_cnh']);
    $crudc_c = new Crudcaminhoneiro();
    $crudc_c->salvar($caminhoneiro);

    header('Location: ../perfilcaminhoneiro.html');
}

function listar_caminhoneiros(){

    $crud = new Crudcaminhoneiro();
    $listacaminhoneiros = $crud->getusuarios();

    include '../view/cabecalho.php';
    require_once __DIR__ . "/../view/perfilCaminhoneiro.html";
}

function listar_caminhoneiro($id){

    $crud = new Crudcaminhoneiro();
    $listacaminhoneiro = $crud->getusuario($id);

    include '../view/cabecalho.php';
    include '../view/perfilCaminhoneiro.html';
}

function excluirusuario($id){

    $crud = new Crudcaminhoneiro();
    $listacaminhoneiro = $crud->excluirusuario($id); //////////////////////////////////////////////// Esta com erro!!!

    include '../view/cabecalho.php';
    include '../view/perfilCaminhoneiro.html';
}

function editar_caminhoneiro($id){

    $crud = new Crudcaminhoneiro();
    $listacaminhoneiro = $crud->getusuario($id); ///////////////////////////////////////////////////////// Esta com erro!!!

    include '../view/cabecalho.html';
    include '../view/caminhoneiro_edicao'; /////////////////////////////////////////////////////////// Pagina formulario !!!
}

function editar2_caminhoneiro($caminhoneiro){

    $caminhoneiro = new caminhoneiro ($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['senha'], $_POST['rg'], $_POST['cpf'], $_POST['num_antt'], $_POST['num_cnh'], $_POST['categoria_cnh'], $_POST['cod_usuario']);
    $crud = new Crudcaminhoneiro();
    $listacaminhoneiro = $crud->editar($caminhoneiro); ///////////////////////////////////////////// Esta com erro!!!

    echo $caminhoneiro->cod_usuario;

    include '../view/cabecalho.php';
    include '../view/perfilCaminhoneiro.html';
}

function verificar_caminhoneiro(){

    session_start();
    session_destroy();
    session_start();

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $crud = new Crudcaminhoneiro();
    $listacaminhoneiros = $crud->getusuarios(); //////////////////////////////////////////////////// Esta com erro!!!
    $usuario_existe = false;

    foreach ($listacaminhoneiros as $listacaminhoneiro) {
        //colar aqui o if
        if ($login == $listacaminhoneiro['login'] AND $senha == $listacaminhoneiro['senha']) {

            $usuario_existe = true;
            $_SESSION = $listacaminhoneiro;
            $_SESSION['usuario_online'] = true;
        }
    }

    if ($usuario_existe == true) {

        include '../view/cabecalho.html';
        include '../view/perfilCaminhoneiro.html'; //////////////////////////////////////////////////// Colocar tela de editar!!!
    }

    $usuario_existe = false;
    $crud = new crud_Empresa(); ////////////////////////////////////////////////// Colocar o crud da caminhoneiro!!!
    $lista_empresas = $crud->getAll();

    foreach ($lista_empresas as $lista_empresa) {

        if ($login == $lista_empresa['login'] AND $senha == $lista_empresa['senha']) {

            $usuario_existe = true;
            $_SESSION = $lista_empresa;
            $_SESSION['usuario_online'] = true;
        }
    }

    if ($usuario_existe == true) {

        include '../view/cabecalho.php';
        include __DIR__ . '/../view/perfilCaminhoneiro.html';

    } else {

        header('Location: ../../index.php');

    }
}

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];

} else {

    header('Location: ../../index.php');

}

//casos
switch ($acao) { //////////////////////////////////////////////////////////////////////////////////////////// Checar!!!

    case 'cadastrar_caminhoneiro':
        cadastrar_caminhoneiro();
        break;

    case 'listar_caminhoneiros':
        listar_caminhoneiros();
        break;

    case 'listar_caminhoneiro':
        listar_caminhoneiro($_GET['id']);
        break;

    case 'excluirusuario':
        excluirusuario($_POST['id']);
        break;

    case 'verificar_caminhoneiro':
        verificar_caminhoneiro();
        break;

    case 'editar_caminhoneiro':
        editar_caminhoneiro($_GET['id']);
        break;

    case 'editar2_caminhoneiro':
        editar2_caminhoneiro($_POST);
        break;

    default:

        break;
}
