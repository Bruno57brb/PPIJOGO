<?php
session_start();

if(empty($_POST) or (empty($_POST['email']) or (empty($_POST['senha'])))) {
    print"<script>location.href='../index.php';</script>";
}
include('conecta.php');

$usuario =  $_POST['email'];
$senha = $_POST['senha'];
$sql = "SELECT * FROM  usuario
 WHERE email    = '{$usuario}'
 AND  senha = '{$senha}'";

 $res = $conexao->query($sql) or die($conexao->error);
 $row = $res->fetch_object();
 $qtd = $res->num_rows;

 if($qtd > 0 ){
    $_SESSION['email'] = $usuario;
    $_SESSION['nome'] = $row->nome;
    header ('Location: dashboard.php');
 }else{
    echo"alert('Usuário e/ou senha incorreto(s)')";
    header ('Location: ../index.php');
 }
 ?>