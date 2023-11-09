<?php

// Receber os dados do formulário
$escolha = $_POST['escolha'];
$idH = $_POST['id_historia'];
$idE = $_POST['id_escolha'];
$idD = $_POST['id_destino'];

// Conectar ao BD
include("../conecta.php");

// Montar o comando SQL
$sql = "INSERT INTO escolhas(escolha, id_historia, id_escolha, id_destino) VALUES ('$escolha', $idH, $idE, $idD)";
// Executar o comando SQL
if (mysqli_query($conexao, $sql)) {
    echo "Arquivo enviado com sucesso!";
} else {
    echo "Falha ao enviar arquivo.";
}
header('Location: ../index.php');
