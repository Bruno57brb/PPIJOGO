<?php
include("../conecta.php");

$id = $_GET['id_historia'];
$lang = $_GET['lang'];

//Seleciona todos os dados da tabela lista
if($lang == '1'){
    $sql = "SELECT * FROM historia WHERE id_historia=$id";
    }else{
        $sql = "SELECT * FROM historiaen WHERE id_historia=$id";
    }

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
        nav ul .cadastrar-historia {
            background: white;
            border-radius: 5px 5px 5px 5px;
            color: black;
        }
    </style>
    <form action="editarHistoria.php" method="POST" enctype="multipart/form-data">
        <div class="form">

            Historia <br><textarea name="texto" rows="5" cols="30" required><?php echo $dados['texto']; ?></textarea><br>
            ID <br><input type="text" name="id_historia" value="<?php echo $dados['id_historia']; ?>"><br>

        </div>
        Cenario</strong>
        <br><label for="cenario">Enviar Cenário</label><input type="file" name="cenario" id="cenario"><br>

        <strong>Personagem</strong>
        <br><label for="personagem">Enviar Personagem</label><input type="file" name="personagem" id="personagem"><br>
        <input type="hidden" name="lang" value="<?php echo $lang; ?>" required>
        <br> <br> <input type="submit" value="Editar">
    </form>
</body>

</html>