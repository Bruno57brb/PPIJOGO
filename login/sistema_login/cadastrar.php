<?php
session_start();
include('../conecta.php');

if(empty($_POST) or (empty($_POST['nome']) or (empty($_POST['email']) or (empty($_POST['senha']))))) {
$usuario =  $_POST['email'];
$senha = $_POST['password'];
$sql = "INSERT INTO usuario (email, senha) VALUES ('$usuario','$senha')";

// Executar o comando SQL
if (mysqli_query($conexao, $sql))
        echo "pessoa cadastrada com sucesso!";
    else
        echo "Falha ao cadastrar pessoa.";
}


header('Location: ../index.php');
 
 ?>
