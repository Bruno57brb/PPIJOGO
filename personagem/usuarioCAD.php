<?php

// Receber os dados do formulário
$nome = $_POST['nome'];
$genero = $_POST[''];

// Conectar ao BD
include("../conecta.php");

// Montar o comando SQL
$sql = "INSERT INTO nome(nome, genero) VALUES ('$nome', $genero)";
// Executar o comando SQL
if (mysqli_query($conexao, $sql)) {
    echo "Arquivo enviado com sucesso!";
} else {
    echo "Falha ao enviar arquivo.";
}
header('Location: ./index.php');