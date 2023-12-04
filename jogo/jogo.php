<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/cenario.css">
    <link rel="shortcut icon" href="../img/EC.png">
    <title>Enigma Capital </title>
    <?php
    $id = (isset($_GET['id_destino']) ? $_GET['id_destino'] : -1);
    if ($_GET["id_usuario"] == 0) {
        $idU = $_GET["id_usuario"] = 0;
    } elseif ($_GET["id_usuario"] == -1) {
        $idU = $_GET["id_usuario"] = -1;
    } else {
        $idU = $_SESSION['id'];

    }
    $usuario = Usuario($idU);
    $lang = (isset($_GET['lang']) ? $_GET['lang'] : 1);
    function Historia($id, $lang)
    {
        include("../conecta.php");
        if ($lang == "1") {
            $sql = "SELECT * FROM historia WHERE id_historia=$id";
        } else if ($lang == "2") {
            $sql = "SELECT * FROM historiaEN WHERE id_historia=$id";
        }
        $resultado = mysqli_query($conexao, $sql);
        return (mysqli_fetch_assoc($resultado));
    }
    function Escolha($id, $lang)
    {
        include("conecta.php");
        if ($lang == "1") {
            $sql = "SELECT * FROM escolhas WHERE id_historia=$id";
        } else if ($lang == "2") {
            $sql = "SELECT * FROM escolhasEN WHERE id_historia=$id";
        }
        $resultado = mysqli_query($conexao, $sql);
        return (mysqli_fetch_all($resultado, MYSQLI_ASSOC));
    }
    function Usuario($idU)
    {
        include("conecta.php");
        $sql = "SELECT * FROM usuario WHERE id_usuario=$idU";
        $resultado = mysqli_query($conexao, $sql);
        return (mysqli_fetch_assoc($resultado));
    }
    ?>
</head>

<body>
    <?php require_once "navbar.php"; ?>
    <?php $dados = Historia($id, $lang); ?>
    <style>
        body {
            background-image: url('../img/<?php echo $dados['cenario']; ?>');
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        #myVideo {
            position: fixed;
            right: 20%;
            bottom: 1%;
            width: 1150px;
            height: 1000px;
        }
    </style>
    <?php if ($dados['video'] == "") {
    } else { ?>
        <video autoplay loop id="myVideo">
            <source src="../img/<?php echo $dados['video']; ?>" type="video/mp4">
        </video>
    <?php } ?>
    <audio autoplay loop>
        <?php if ($dados['musica'] == '1') { ?>
            <source src="../img/Lost Painting.mp3" type="audio/mpeg">
        <?php } ?>
    </audio>
    <div class="historia">
        <?php if ($dados['nome'] == "") {

        } else { ?>
            <div class="nome-historia">
                <p>
                    <?php echo $dados['nome']; ?>
                </p>
            </div>
        <?php } ?>
        <?php if ($dados['personagem'] == "") {

        } else { ?>
            <img src="../img/<?php echo $dados['personagem']; ?>" class="personagem-historia" width="400" height="400">
        <?php } ?>

        <?php if ($dados['texto'] == "") {

        } else {
            if ($dados["animacao"] == "0") { ?>
                <div class="balao-historia">
                    <p class="texto-dinamico-historia">
                        <?php echo str_replace("P.P", $usuario['nome'], $dados['texto']) ?>
                    </p>
                </div>
            <?php } else { ?>
                <div class="balao-historia">
                    <p>
                        <?php echo str_replace("P.P", $usuario['nome'], $dados['texto']) ?>
                    </p>
                <?php }
        } ?>
        </div>
    </div>
    <div class="escolhas">
        <div class="balao-escolha">
            <?php foreach (Escolha($id, $lang) as $escolha): ?>
                <div class="texto-escolha">
                    <?php if($escolha['id_historia'] == -5){
                        echo '<a href="index.php">Jogar novamente</a><br>';
                        echo '<br><a href="../sair.php">Sair</a>';
                    }else{ echo '<a class="texto-dinamico-escolhas" href="jogo.php?id_destino=' . $escolha['id_destino'] . '&id_usuario=' . $escolha['id_usuario'] . '&lang=' . $lang . '">' . str_replace("P.P", $usuario['nome'], $escolha['escolha']) . ' </a>'; }?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="nome-usuario">
        <p>
            <?php echo $usuario['nome']; ?>
        </p>
    </div>
    <div class="fundo-personagem">
        <img src="../img/<?php echo $usuario['imagem']; ?>" class="personagem-escolhas" width="400" height="400">
    </div>
    <script>
        function typeWriterSlow(elemento) {
            const textoArray = elemento.innerHTML.split('');
            elemento.innerHTML = '';
            textoArray.forEach((letra, i) => {
                setTimeout(() => elemento.innerHTML += letra, 30 * i);
            });
        }
        const historia = document.querySelector('.texto-dinamico-historia');
        typeWriterSlow(historia);

    </script>
    <script>
        function typeWriterFast(elemento) {
            const textoArray = elemento.innerHTML.split('');
            elemento.innerHTML = '';

            setTimeout(() => {
                textoArray.forEach((letra, i) => {
                    setTimeout(() => elemento.innerHTML += letra, 50 * i);
                });
            }, 3000);
        }

        const escolhasFast = document.querySelectorAll('.texto-dinamico-escolhas');
        escolhasFast.forEach(elemento => {
            typeWriterFast(elemento);
        });

    </script>
</body>

</html>
