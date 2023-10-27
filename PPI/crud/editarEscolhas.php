<?php

$escolhas = $_GET['escolhas'];
$id = $_GET['id_escolhas'];

include("../conecta.php");

    $sql = "UPDATE escolhas SET escolha = '$escolhas' WHERE id_escolhas = $id";
    if (mysqli_query($conexao, $sql))
        echo "cenario enviado com sucesso!";
    else
        echo "Falha ao enviar cenario.";
header('Location: listarE.php');
