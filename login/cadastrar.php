<?php

require_once 'conectar.php';
$conexao =  conectar();

$usuario =  $_POST['usuario'];
$senha = $_POST['password'];
$sql = "INSERT INTO usuario (email, senha) VALUES ('$usuario','$senha')";

// Executar o comando SQL
$result = mysqli_query($conexao, $sql);
if ($result === false) {
   if(mysqli_errno($conexao) == 1062){
    echo"Usuario ja cadastrado no Jogo!!!
    Tente fazer o login ou faça a recuperação";  
   die();
}else{
   echo "Erro ao inserir o novo usuário" .
      mysqli_errno($conexao) . ":" . mysqli_error($conexao);
   die();

}
}
header('location:../index.php')

 ?>
