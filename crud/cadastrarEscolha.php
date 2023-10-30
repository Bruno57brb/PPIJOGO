<?php

// Receber os dados do formulário
$escolha = $_POST['escolha'];
$id = $_POST['id_historia'];

// Conectar ao BD
include("../conecta.php");

// Montar o comando SQL
$sql = "INSERT INTO escolhas(escolha, id_historia) VALUES ('$escolha', $id)";
// Executar o comando SQL
if (mysqli_query($conexao, $sql)) {
    echo "Arquivo enviado com sucesso!";
    header('Location: ../index.php');
} else {
    echo "Falha ao enviar arquivo.";
}
