<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/cenario.css">
    <link rel="shortcut icon" href="img/EC.png">
    <title>Enigma Capital</title>
    <?php
    $id = (isset($_GET['id_destino']) ? $_GET['id_destino'] : -2);
    $idU = (isset($_GET['id_usuario']) ? $_GET['id_usuario'] : 0);
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
            <p id="texto-dinamico">
                <?php echo $dados['texto']; ?>
            </p>
        </div>
    </div>
    <div class="escolhas">
        <div class="balao-escolha">
            <?php foreach (Escolha($id) as $escolha): ?>
                <div class="texto-escolha">
                    <p id="texto-dinamico">
                        <?php echo '<a href="jogo.php?id_destino=' . $escolha['id_destino'] . '&id_usuario=' . $escolha['id_usuario'] . '">' . $escolha['escolha'] . ' </a>'; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php $usuario = Usuario($idU) ?>
    <div class="nome-usuario">
        <p>
            <?php echo $usuario['nome']; ?>
        </p>
    </div>
    <div class="fundo-personagem">
        <img src="img/<?php echo $usuario['imagem']; ?>" class="personagem-escolhas" width="400" height="400">
    </div>
    <script>
        function typeWriter(elemento) {
            const textoArray = elemento.innerHTML.split('');
            elemento.innerHTML = '';
            textoArray.forEach((letra, i) => {
                setTimeout(() => elemento.innerHTML += letra, 55 * i)
            });

        }
        const texto = document.querySelector('#texto-dinamico');
        typeWriter(texto);
    </script>
</body>

</html>