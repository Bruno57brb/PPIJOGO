<?php
include("../conecta.php");

$id = $_GET['id_historia'];
$texto = $_GET['texto'];

//Seleciona todos os dados da tabela lista
$sql = "SELECT * FROM historia WHERE id_historia=$id";

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
    $sql = "SELECT * FROM historia";
    $resultado = mysqli_query($conexao, $sql);
    ?>
</head>

<body>
    <fieldset>
        <form action="editarHistoria.php" method="POST" enctype="multipart/form-data">
            <div class="form">

                Historia <br><input type="text" name="nome" value="<?php echo $dados['texto']; ?>" required><br>
                ID <br><input type="text" name="id" value="<?php echo $dados['id_historia']; ?>"><br>

            </div>

            Cenario <br><input type="file" name="cenario" required><br>
            Personagem <br><input type="file" name="personagem" required><br>

            <br> <br> <input type="submit" value="Editar">
        </form>
    </fieldset>
</body>

</html>