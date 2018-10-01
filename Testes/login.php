<?php

require_once "conexao.php";

$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = ($_POST['senha']);
$connect = ('localhost','root','root');
$db = ('TheWay');
if (isset($entrar)) {

    $verifica = ("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar");
    if (($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
        die();
    }else{
        setcookie("login",$login);
        header("Location:index.php");
    }
}
?>