<?php
include("conecta.php");

$id = $_GET['id_historia'];

//define a pasta para onde enviaremos o arquivo
$diretorio = "../img/";

$sql = "SELECT * FROM historia WHERE id_historia=$id";
$resultado = mysqli_query($conexao, $sql);
$historia = mysqli_fetch_assoc($resultado);

unlink($diretorio . $historia['cenario']);
unlink($diretorio . $historia['personagem']);
$sql = "DELETE FROM historia WHERE id_historia = $id";
mysqli_query($conexao, $sql);

header('Location: listar.php');
