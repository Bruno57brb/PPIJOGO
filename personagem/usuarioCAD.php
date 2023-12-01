<?php

session_start();

// Receber os dados do formulário
$nome = $_POST['nome'];
$img = $_POST['imagem'];

// Conectar ao BD
include("../conecta.php");
// Montar o comando SQL
$sql = "UPDATE usuario SET nome = $nome, imagem = $img WHERE id_usuario = LAST_INSERT_ID()";
// Executar o comando SQL
if (mysqli_query($conexao, $sql)) {
    echo "Arquivo enviado com sucesso!";
} else {
    echo "Falha ao enviar arquivo.";
}
header('Location: ../index.php');