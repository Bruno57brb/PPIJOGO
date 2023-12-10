<?php

$escolhas = $_POST['escolha'];
$idH = $_POST['id_historia'];
$idE = $_POST['id_escolha'];
$idD = $_POST['id_destino'];
$lang = $_POST['lang'];

include("../conecta.php");
if($lang == 1){
    $sql = "UPDATE escolhas SET escolha = '$escolhas', id_historia = '$idH', id_destino='$idD' WHERE id_escolha = $idE";
    }else{
        $sql = "UPDATE escolhasen SET escolha = '$escolhas', id_historia = '$idH', id_destino='$idD' WHERE id_escolha = $idE";
    }
if (mysqli_query($conexao, $sql))
    echo "cenario enviado com sucesso!";
else
    echo "Falha ao enviar cenario.";
header('Location: listarE.php');
