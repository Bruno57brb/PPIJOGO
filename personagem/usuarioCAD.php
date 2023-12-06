<?php

session_start();

// Receber os dados do formulário
$nome = $_POST['nome'];
$img = $_POST['imagem'];
$email = $_SESSION['email'];
// Conectar ao BD
include("../conecta.php");
// Montar o comando SQL
$sql = "UPDATE usuario SET nome = '$nome', imagem = '$img' WHERE id_usuario = ".$_SESSION['id'];
// Executar o comando SQL
if (mysqli_query($conexao, $sql)) {
    echo "Arquivo enviado com sucesso!";
} else {
    echo "Falha ao enviar arquivo.";
}
if($email == "lorenzo.2022310934@aluno.iffar.edu.br" or "bruno.2022310863@aluno.iffar.edu.br" or "laura.2022315529@aluno.iffar.edu.br" or "antonio.2022324018@aluno.iffar.edu.br"){
    header('Location: ../jogo/jogoADM.php');
}else{
    header('Location: ../jogo/index.php');
}
