<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <title>lorenzo</title>
</head>

<body>
    
    <fieldset>
        
        <form action="cadastrarHistoria.php" method="post" enctype="multipart/form-data">
            <div class="form">
                <strong>História <br><input type="text" name="texto" required><br>
            </div>
            Cenario</strong> <br><input type="file" name="cenario" required><br>

            Personagem</strong> <br><input type="file" name="personagem" required><br>
            <strong>
                <br> <br>
                <div class="enviar"><input type="submit" value="Cadastrar"></div>
        </form>
    </fieldset>
</body>
</html>