<?php
include("../conecta.php");

$id = $_GET['id_escolha'];
$texto = $_GET['escolha'];

//Seleciona todos os dados da tabela lista
$sql = "SELECT * FROM escolhas WHERE id_escolha=$id";

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
    <?php include("../conecta.php");
    $sql = "SELECT * FROM escolhas";
    $resultado = mysqli_query($conexao, $sql);
    ?>
</head>

<body>
    <?php require_once "navbar.php"; ?>
    <style>
        nav ul .cadastrar-escolha {
            background: white;
            border-radius: 5px 5px 5px 5px;
            color: black;
        }
    </style>
    <form action="editarEscolhas.php" method="POST" enctype="multipart/form-data">
        <div class="form">

            Escolhas <br><textarea name="escolha" rows="5" cols="30" required><?php echo $dados['escolha']; ?></textarea><br>
            ID <br><input type="text" name="id_escolha" value="<?php echo $dados['id_escolha']; ?>"><br>

        </div>

        <br> <br> <input type="submit" value="Editar">
    </form>
</body>

</html>