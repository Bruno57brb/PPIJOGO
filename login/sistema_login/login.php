<?php
session_start();
if(empty($_POST) or (empty($_POST['email']) or (empty($_POST['senha'])))) {
   echo"<script>location.href='';</script>";
}
include('conecta.php');

$usuario =  $_POST['email'];
$senha = $_POST['senha'];
$sql = "SELECT * FROM  usuario WHERE email = '{$usuario}' AND  senha = '{$senha}'";

$res = $conexao->query($sql) or die($conexao->error);
$row = $res->fetch_object();
$qtd = $res->num_rows;

if($qtd > 0 ){
    $_SESSION['email'] = $usuario;
    $_SESSION['senha'] = $senha;
    header ('Location: ../../personagem/index.php ');
 }else{
    echo"alert('Usuário e/ou senha incorreto(s)')";
    header ('Location: protect.php');
 }

 ?>