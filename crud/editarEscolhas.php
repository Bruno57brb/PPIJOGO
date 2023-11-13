<?php

$escolhas = $_POST['escolha'];
$idH = $_POST['id_historia'];
$idE = $_POST['id_escolha'];
$idD = $_POST['id_destino'];

include("../conecta.php");

$sql = "UPDATE escolhas SET escolha = '$escolhas', id_historia = '$idH', id_destino='$idD' WHERE id_escolha = $idE";
if (mysqli_query($conexao, $sql))
    echo "cenario enviado com sucesso!";
else
    echo "Falha ao enviar cenario.";
header('Location: listarE.php');
