<?php

// Receber os dados do formulário
$nome = $_POST['nome'];
$img = $_POST['imagem'];

// Conectar ao BD
include("../conecta.php");

// Montar o comando SQL
$sql = "INSERT INTO usuario(nome, imagem) VALUES ('$nome', '$img')";
// Executar o comando SQL
if (mysqli_query($conexao, $sql)) {
    echo "Arquivo enviado com sucesso!";
} else {
    echo "Falha ao enviar arquivo.";
}