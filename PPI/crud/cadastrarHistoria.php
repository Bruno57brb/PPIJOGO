<?php

// Receber os dados do formulário
$texto = $_POST['texto'];

// Conectar ao BD
include("../conecta.php");

// Montar o comando SQL

if (isset($_FILES['cenario']) and (isset($_FILES['personagem']))) {

    //pega a extensao do arquivo
    $extensao = strtolower(substr($_FILES['cenario']['name'], -4));
    $extensao1 = strtolower(substr($_FILES['personagem']['name'], -4));

    //define o nome do arquivo
    $cenario = time() . $_FILES['cenario']['name'];
    $personagem = time() . $_FILES['personagem']['name'];

    //define a pasta para onde enviaremos o arquivo
    $diretorio = "../img/";

    //faz o upload, movendo o arquivo para a pasta especificada
    move_uploaded_file($_FILES['cenario']['tmp_name'], $diretorio . $cenario);
    move_uploaded_file($_FILES['personagem']['tmp_name'], $diretorio . $personagem);

    $sql = "INSERT INTO historia(texto, cenario, personagem) VALUES ('$texto','$cenario', '$personagem')";
    // Executar o comando SQL
    if (mysqli_query($conexao, $sql))
        echo "Arquivo enviado com sucesso!";
    else
        echo "Falha ao enviar arquivo.";
}
header('Location: ../index.php');
