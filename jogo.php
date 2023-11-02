<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/cenario.css">
    <title>PPI</title>
    <?php
    $id = $_GET['id_historia'];
    function Historia($id){
        include("conecta.php");
        $sql = "SELECT * FROM historia WHERE id_historia='$id'";
        $resultado = mysqli_query($conexao, $sql);
    }
    function Escolha($id){
        include("conecta.php");
        $sql = "SELECT * FROM escolhas WHERE id_escolha='$id'";
        $resultado = mysqli_query($conexao, $sql);
    }
    function Usuario(){
        include("conecta.php");
        $sql = "SELECT * FROM usuario";
        $resultado = mysqli_query($conexao, $sql);
    }
    
    
    
    
    ?>
</head>

<body>

    <?php while ($dados1 = mysqli_fetch_assoc($resultadoH)) { ?>
        <style>
            body {
                background-image: url('img/<?php echo $dados1['cenario']; ?>');
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
        </style>
        <div class="historia">
            <img src="img/<?php echo $dados1['personagem']; ?>" class="personagem-historia" width="400" height="400">

            <div class="balao-historia">
                <?php echo $dados1['texto']; ?>
            </div>
        </div>
    <?php } ?>
    <?php while ($dados2 = mysqli_fetch_assoc($resultadoE)) { ?>
        <div class="escolhas">
            <div class="balao-escolha">
                <p class="texto-escolha">
                    <?php echo $dados2['escolha']; ?>
                    <a href="jogo.php?id_historia=">
                </p>
            </div>
        </div>

    <?php } ?>
    <?php while ($dados3 = mysqli_fetch_assoc($resultadoU)) { ?>
        <div class="fundo-personagem">
            <img src="img/<?php echo $dados3['imagem']; ?>" class="personagem-escolhas" width="400" height="400">
        </div>
    <?php } ?>
</body>

</html>