<?php
include("../conecta.php");

$id = $_GET['id_escolha'];

//define a pasta para onde enviaremos o arquivo
$diretorio = "../img/";

$sql = "SELECT * FROM escolhas WHERE id_escolha=$id";
$resultado = mysqli_query($conexao, $sql);
$escolhas = mysqli_fetch_assoc($resultado);

$sql = "DELETE FROM escolhas WHERE id_escolha = $id";
mysqli_query($conexao, $sql);

header('Location: listarE.php');
