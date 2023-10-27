<?php

// Receber os dados do formulário
$escolha = $_POST['escolha'];

// Conectar ao BD
include("../conecta.php");

// Montar o comando SQL
$sql = "INSERT INTO escolhas(escolha) VALUES ('$escolha')";
// Executar o comando SQL
if (mysqli_query($conexao, $sql))
    echo "Arquivo enviado com sucesso!";
else
    echo "Falha ao enviar arquivo.";
header('Location: ../index.php');
