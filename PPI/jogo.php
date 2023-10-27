<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/cenario.css">
    <title>PPI</title>
    <?php
    include("conecta.php");
    $sqlH = "SELECT * FROM historia";
    $resultadoH = mysqli_query($conexao, $sqlH);
    $sqlE = "SELECT * FROM escolhas";
    $resultadoE = mysqli_query($conexao, $sqlE);
    ?>
</head>

<body>

    <?php while ($dados1 = mysqli_fetch_assoc($resultadoH)) { ?>
            <div class="historia">
                <img src="img/personagem-vilao.png" class="personagem-historia" width="400" height="400">

                <div class="balao-historia">
                    <?php echo $dados1['texto']; ?>
                </div>
            </div>
            <?php } ?>
    <?php while ($dados2 = mysqli_fetch_assoc($resultadoE)) { ?>
            <div class="escolhas">
                <div class="balao-escolha">
                    <p class="texto-escolha"><?php echo $dados2['escolha']; ?></p>
                </div>
            </div>

        <?php } ?>
        <div class="fundo-personagem">
                <img src="img/personagem-fem.png" class="personagem-escolhas" width="400" height="400">
                </div>
</body>

</html>

teste