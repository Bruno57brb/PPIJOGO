<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/form.css">
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
                <strong>História <br><input type="text" name="texto" required><br>

                Id História <br><input type="text" name="id_historia" required><br>
            </div>
            Cenario</strong> 
                <br><label for="cenario">Enviar Cenário</label><input type="file" name="cenario" id="cenario"required><br>
            
            <strong>Personagem</strong>
                 <br><label for="personagem">Enviar Personagem</label><input type="file" name="personagem" id="personagem" required><br>
            
                <br> <br>
                <div class="enviar"><input type="submit" value="Cadastrar"></div>
        </form>

</body>

</html>