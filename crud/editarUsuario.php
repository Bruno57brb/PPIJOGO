<?php

$nome = $_POST['nome'];
$email = $_POST['nome'];
$senha = $_POST['nome'];
$id = $_POST['id_usuario'];

include("../conecta.php");

    //cadastra no banco
    $sql = "UPDATE usuario SET nome = '$nome', email ='$email', senha ='$senha' WHERE id_usuario = $id";
    if (mysqli_query($conexao, $sql))
        echo "cenario enviado com sucesso!";
    else
        echo "Falha ao enviar cenario.";

header('Location: listarU.php');
