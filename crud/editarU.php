<?php
include("../conecta.php");

$id = $_GET['id_usuario'];

//Seleciona todos os dados da tabela lista
$sql = "SELECT * FROM usuario WHERE id_usuario=$id";

//executa o select
$resultado = mysqli_query($conexao, $sql);

$dados = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
<link rel="stylesheet" href="../css/navbar.css">
<link rel="stylesheet" href="../css/form.css">

<head>
    <meta charset="UTF-8">
    <title>PPI</title>
</head>

<body>
    <?php require_once "navbar.php"; ?>
    <style>
        nav ul .listarU {
            background: white;
            border-radius: 5px 5px 5px 5px;
            color: black;
        }
    </style>
    <form action="editarUsuario.php" method="POST" enctype="multipart/form-data">
        <div class="form">

            Nome <br><input type="text" name="nome" value="<?php echo $dados['nome']; ?>"><br>
            Email <br><input type="text" name="email" value="<?php echo $dados['email']; ?>"><br>
            Senha <br><input type="text" name="senha" value="<?php echo $dados['senha']; ?>"><br>

        </div>
        <br> <br> <input type="submit" value="Editar">
    </form>
</body>

</html>