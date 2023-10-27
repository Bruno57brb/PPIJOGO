<?php
include("../conecta.php");

$id = $_GET['id_escolhas'];

//define a pasta para onde enviaremos o arquivo
$diretorio = "../img/";

$sql = "SELECT * FROM escolhas WHERE id_escolhas=$id";
$resultado = mysqli_query($conexao, $sql);
$historia = mysqli_fetch_assoc($resultado);

$sql = "DELETE FROM escolhas WHERE id_escolhas = $id";
mysqli_query($conexao, $sql);

header('Location: listarE.php');
