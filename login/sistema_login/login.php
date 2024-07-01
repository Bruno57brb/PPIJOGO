<?php
session_start();
require_once 'conectar.php';
$conexao = conectar();


$usuario = $_POST['email'];
$senha = $_POST['senha'];


$sql = "SELECT * FROM usuario WHERE email = '{$usuario}' AND  senha = '{$senha}'";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado);

$res = $conexao->query($sql) or die($conexao->error);
$row = $res->fetch_object();
$qtd = $res->num_rows;

if ($qtd > 0) {
   $_SESSION['email'] = $usuario;
   $_SESSION['senha'] = $senha;
   $_SESSION['id'] = $dados['id_usuario'];
   header('Location: login.php ');
} else {
   echo "alert('Usuário e/ou senha incorreto(s)')";
   header('Location: protect.php');
}

?>