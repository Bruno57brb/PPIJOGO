<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/cenario.css">
    <link rel="shortcut icon" href="img/EC.png">
    <title>Enigma Capital</title>
    <?php
    $id = (isset($_GET['id_destino']) ? $_GET['id_destino'] : 0);
    function Historia($id)
    {
        include("conecta.php");
        $sql = "SELECT * FROM historia WHERE id_historia=$id";
        $resultado = mysqli_query($conexao, $sql);
        return (mysqli_fetch_assoc($resultado));
    }
    function Escolha($id)
    {
        include("conecta.php");
        $sql = "SELECT * FROM escolhas WHERE id_historia=$id";
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
    <?php $dados = Historia($id); ?>
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
    <div class="escolhas">
        <div class="balao-escolha">
                <?php foreach (Escolha($id) as $escolha): ?>
                <p class="texto-escolha">
                    <?php echo '<a href="jogo.php?id_destino=' . $escolha['id_destino'] . '">' . $escolha['escolha']. ' </a>'; ?>
                </p>
                <?php endforeach; ?>
            </div>
        </div>

    <?php $usuario = Usuario() ?>
     <div class="fundo-personagem">
        <img src="img/<?php echo $usuario['imagem']; ?>" class="personagem-escolhas" width="400" height="400">
    </div>
</body>

</html>