<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/cenario.css">
    <title>PPI</title>
    <?php
    $id = $_GET['id_historia'];
    function Historia($id)
    {
        include("conecta.php");
        $sql = "SELECT * FROM historia WHERE id_historia='$id'";
        $resultado = mysqli_query($conexao, $sql);
        return (mysqli_fetch_all($resultado, MYSQLI_ASSOC));
    }
    function Escolha($id)
    {
        include("conecta.php");
        $sql = "SELECT * FROM escolhas WHERE id_escolha='$id'";
        $resultado = mysqli_query($conexao, $sql);
        return (mysqli_fetch_all($resultado, MYSQLI_NUM));
    }
    function Usuario()
    {
        include("conecta.php");
        $sql = "SELECT * FROM usuario";
        $resultado = mysqli_query($conexao, $sql);
        return (mysqli_fetch_all($resultado, MYSQLI_ASSOC));
    }
    ?>
</head>

<body>

    <?php while ($dados = Historia($id)) { ?>
        <style>
            body {
                background-image: url('img/<?php echo $dados['cenario']; ?>');
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
        </style>
        <div class="historia">
            <img src="img/<?php echo $dados['personagem']; ?>" class="personagem-historia" width="400" height="400">

            <div class="balao-historia">
                <?php echo $dados['texto']; ?>
            </div>
        </div>
    <?php } ?>
    <?php while ($dados = Escolha($id)) { ?>
        <div class="escolhas">
            <div class="balao-escolha">
                <p class="texto-escolha">
                    <?php echo $dados['escolha'];
                    echo '<a href="jogo.php?id_historia=' . $dados['id_historia'] . '">'; ?>
                </p>
            </div>
        </div>

    <?php } ?>
    <?php while ($dados = Usuario()) { ?>
        <div class="fundo-personagem">
            <img src="img/<?php echo $dados['imagem']; ?>" class="personagem-escolhas" width="400" height="400">
        </div>
    <?php } ?>
</body>

</html>