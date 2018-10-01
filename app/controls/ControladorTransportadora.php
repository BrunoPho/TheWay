<?php 
//requisição dos arquivos

require_once "../models/transportadora.php";

require_once "../models/CrudTransportadora.php";
//sessao
  if (!isset($_SESSION)){
      session_start();
}

  if (!isset($_GET['acao'])) {
      $_GET['acao'] = null;

      function cadastrar_transportadora()
      {
          /*    var_dump($_POST);*/
          $transportadora = new transportadora ($_POST['cnpj'], $_POST['razao_social']);
          $crudc_c = new Crudtransportadora ();
          $crudc_c->salvar($transportadora);

          header('Location: ../perfiltransportadora.html');
      }

      function listar_transportadoras()
      {

          $crud = new Crudtransportadora();
          $listatransportadoras = $crud->getusuarios();

          include '../view/cabecalho.php';
          require_once __DIR__ . "/../view/perfilTransportadora.html";
      }

      function listar_transportadora($id)
      {

          $crud = new Crudtransportadora();
          $listatransportadora = $crud->getusuario($id);

          include '../view/cabecalho.php';
          include '../view/perfilTransportadora.html';
      }

      function excluirusuario($id)
      {

          $crud = new Crudtransportadora();
          $listatransportadora = $crud->excluirusuario($id); //////////////////////////////////////////////// Esta com erro!!!

          include '../view/cabecalho.php';
          include '../view/perfilTransportadora.html';
      }

      function editar_transportadora($id)
      {

          $crud = new Crudtransportadora();
          $listatransportadora = $crud->getusuario($id); ///////////////////////////////////////////////////////// Esta com erro!!!

          include '../view/cabecalho.html';
          include '../view/transportadora_edicao'; /////////////////////////////////////////////////////////// Pagina formulario !!!
      }

      function editar2_transportadora($transportadora)
      {

          $transportadora = new transportadora ($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['senha'], $_POST['rg'], $_POST['cpf'], $_POST['num_antt'], $_POST['num_cnh'], $_POST['categoria_cnh'], $_POST['cod_usuario']);
          $crud = new Crudtransportadora();
          $listatransportadora = $crud->editar($transportadora); ///////////////////////////////////////////// Esta com erro!!!

          echo $transportadora->cod_usuario;

          include '../view/cabecalho.php';
          include '../view/perfilTransportadora.html';
      }

      function verificar_transportadora()
      {

          session_start();
          session_destroy();
          session_start();

          $login = $_POST['login'];
          $senha = $_POST['senha'];

          $crud = new Crudtransportadora();
          $listatransportadoras = $crud->getusuarios(); //////////////////////////////////////////////////// Esta com erro!!!
          $usuario_existe = false;

          foreach ($listatransportadoras as $listatransportadora) {
              //colar aqui o if
              if ($login == $listatransportadora['login'] AND $senha == $listatransportadora['senha']) {

                  $usuario_existe = true;
                  $_SESSION = $listatransportadora;
                  $_SESSION['usuario_online'] = true;
              }
          }

          if ($usuario_existe == true) {

              include '../view/cabecalho.html';
              include '../view/perfilTransportadora.html'; //////////////////////////////////////////////////// Colocar tela de editar!!!
          }

          $usuario_existe = false;
          $crud = new crud_Empresa(); ////////////////////////////////////////////////// Colocar o crud da transportadora!!!
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
              include __DIR__ . '/../view/perfilTransportadora.html';

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

          case 'cadastrar_transportadora':
              cadastrar_transportadora();
              break;

          case 'listar_transportadoras':
              listar_transportadoras();
              break;

          case 'listar_transportadora':
              listar_transportadora($_GET['id']);
              break;

          case 'excluirusuario':
              excluirusuario($_POST['id']);
              break;

          case 'verificar_transportadora':
              verificar_transportadora();
              break;

          case 'editar_transportadora':
              editar_transportadora($_GET['id']);
              break;

          case 'editar2_transportadora':
              editar2_transportadora($_POST);
              break;

          default:

              break;
      }
  }