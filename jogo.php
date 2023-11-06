<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/cenario.css">
    <link rel="shortcut icon" href="img/EC.png">
    <title>Enigma Capital</title>
    <?php
    if ($_GET) {
        $id = $_GET['id_historia'];
        $id = explode(" ", $id);
    } else {
        $id = 1;
    }
    function Historia($id)
    {
        include("conecta.php");
        $sql = "SELECT * FROM historia WHERE id_historia='$id'";
        $resultado = mysqli_query($conexao, $sql);
        return (mysqli_fetch_assoc($resultado));
    }
    function Escolha($id)
    {
        include("conecta.php");
        $sql = "SELECT * FROM escolhas WHERE id_historia='$id'";
        $resultado = mysqli_query($conexao, $sql);
        return (mysqli_fetch_all($resultado, MYSQLI_ASSOC));
    }
    function Usuario()
    {
        include("conecta.php");
        $sql = "SELECT * FROM usuario";
        $resultado = mysqli_query($conexao, $sql);
        return (mysqli_fetch_assoc($resultado));
    }
    ?>
</head>

<body>

    <?php $dados = Historia($id) ?>
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
    <?php //var_dump(Escolha($id));die; ?>
    <?php foreach (Escolha($id) as $escolha): ?>
        <div class="escolhas">
            <div class="balao-escolha">
                <p class="texto-escolha">
                    <?php echo $escolha['escolha'];
                    echo '<a href="jogo.php?id_historia=' . $escolha['id_historia'] . '&id_escolha=' . $escolha['id_escolha'] . '&id_destino=' . $escolha['id_destino'] . '">'; ?>
                </p>
            </div>
        </div>

    <?php endforeach; ?>
    <?php //$usuario = Usuario() ?>
    <!-- <div class="fundo-personagem">
        <img src="img/<?php echo $usuario['imagem']; ?>" class="personagem-escolhas" width="400" height="400">
    </div> -->
</body>

</html>