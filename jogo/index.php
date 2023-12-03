<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/EC.png">
    <title>Enigma Capital</title>
    </head>
    
<body>
    <label class="titulo"><img src="../img/Enigma" width="350px" height="350px"></label><br>
    <?php
    $lang = (isset($_GET['lang']) ? $_GET['lang'] : 1);
if ($lang == 1) {
    echo '<button type="button" class="iniciar"><a href="jogo.php?id_usuario=0&lang=1">INICIAR</a></button>';
} else if ($lang == 2) {
    echo '<button type="button" class="iniciar"><a href="jogo.php?id_usuario=0&lang=2">INICIAR</a></button>';
} ?>
    <label class="autores">Autores:<br><br>Antonio Mongelo<br>Bruno Bitencourt<br>Laura Oliveira<br>Lorenzo Marty<br></label>
    <div class="lang">
                    <a href="index.php?lang=1&id_usuario=0"><img src="../img/PT.png"></a></li>
                    <a href="index.php?lang=2&id_usuario=0"><img src="../img/EN.png"></a></li>
                </div>
</body>

</html>