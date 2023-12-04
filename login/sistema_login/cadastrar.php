<?php

include('../../conecta.php');


$usuario =  $_POST['email'];
$senha = $_POST['password'];
$sql = "INSERT INTO usuario (email, senha) VALUES ('$usuario','$senha')";

// Executar o comando SQL
if (mysqli_query($conexao, $sql)){
        echo "pessoa cadastrada com sucesso!";
        header('Location: ../../index.php');
}else{
        echo "Falha ao cadastrar pessoa.";
    }

 
 ?>
