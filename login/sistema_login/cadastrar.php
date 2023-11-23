<?php
include('conecta.php');
session_start();

if(empty($_POST) or (empty($_POST['nome']) or (empty($_POST['email']) or (empty($_POST['senha']))))) {
$usuario =  $_POST['email'];
$senha = $_POST['password'];
$nome= $_POST['username'];
$sql = "INSERT INTO usuario (email, senha, nome) VALUES ('$usuario','$senha','$nome')";


// Executar o comando SQL
if (mysqli_query($conexao, $sql))
        echo "pessoa cadastrada com sucesso!";
    else
        echo "Falha ao cadastrar pessoa.";
}


header('Location: login.php');
 
 ?>