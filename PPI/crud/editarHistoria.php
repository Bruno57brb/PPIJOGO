<?php

$texto = $_POST['texto'];
$id = $_POST['id_historia'];

include("../conecta.php");

if (isset($_FILES['cenario']) and (isset($_FILES['personagem']))) {

    //pega a extensao do cenario
    $extensao = strtolower(substr($_FILES['cenario']['name'], -4));
    $extensao1 = strtolower(substr($_FILES['personagem']['name'], -4));

    //define o nome do cenario
    $cenario = time() . $_FILES['cenario']['name'];
    $personagem = time() . $_FILES['personagem']['name'];

    //define a pasta para onde enviaremos o cenario
    $diretorio = "../img/";

    //faz o upload, movendo o cenario para a pasta especificada
    move_uploaded_file($_FILES['cenario']['tmp_name'], $diretorio . $cenario);
    move_uploaded_file($_FILES['personagem']['tmp_name'], $diretorio . $personagem);

    //cadastra no banco
    $sql = "UPDATE historia SET texto = '$texto', cenario ='$cenario', personagem ='$personagem' WHERE id_historia = $id";
    if (mysqli_query($conexao, $sql))
        echo "cenario enviado com sucesso!";
    else
        echo "Falha ao enviar cenario.";
}
header('Location: listarH.php');
