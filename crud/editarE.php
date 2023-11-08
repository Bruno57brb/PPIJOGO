<?php
include("../conecta.php");

$id = $_GET['id_escolhas'];
$texto = $_GET['escolhas'];

//Seleciona todos os dados da tabela lista
$sql = "SELECT * FROM escolhas WHERE id_escolhas=$id";

//executa o select
$resultado = mysqli_query($conexao, $sql);

$dados = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>PPI</title>
    <?php include("../conecta.php");
    $sql = "SELECT * FROM escolhas";
    $resultado = mysqli_query($conexao, $sql);
    ?>
</head>

<body>
    <fieldset>
        <form action="editarEscolhas.php" method="POST" enctype="multipart/form-data">
            <div class="form">

                Escolhas <br><input type="text" name="nome" value="<?php echo $dados['escolha']; ?>" required><br>
                ID <br><input type="text" name="id" value="<?php echo $dados['id_escolhas']; ?>"><br>

            </div>

            <br> <br> <input type="submit" value="Editar">
        </form>
    </fieldset>
</body>

</html>