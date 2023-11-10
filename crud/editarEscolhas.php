<?php

$escolhas = $_POST['escolha'];
$id = $_POST['id_escolha'];

include("../conecta.php");

$sql = "UPDATE escolhas SET escolha = '$escolhas' WHERE id_escolha = $id";
if (mysqli_query($conexao, $sql))
    echo "cenario enviado com sucesso!";
else
    echo "Falha ao enviar cenario.";
header('Location: listarE.php');
