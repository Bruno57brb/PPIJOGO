<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="shortcut icon" href="../img/EC.png">
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

        <form action="cadastrarHistoria.php" method="post" enctype="multipart/form-data">
            <div class="form">
                <strong>História <br><textarea name="texto" rows="5" cols="30" required></textarea><br>

                Id História <br><input type="text" name="id_historia" required><br>
            </div>
            Cenario</strong> 
                <br><label for="cenario">Enviar Cenário</label><input type="file" name="cenario" id="cenario"required><br>
            
            <strong>Personagem</strong>
                 <br><label for="personagem">Enviar Personagem</label><input type="file" name="personagem" id="personagem" required><br>
            
                 <strong>Idioma</strong>
                 <br><select name="lang" id="lang">
                    <option value="1">PT</option>
                    <option value="2">EN</option>
                 </select>
                 
                <br> <br>
                <div class="enviar"><input type="submit" value="Cadastrar"></div>
        </form>

</body>

</html>