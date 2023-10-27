<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/navbar.css">
    <title>PPI</title>
</head>
    <?php require_once "navbar.php"; ?>
<body>
    
    <fieldset>
        <form action="cadastrarEscolha.php" method="post" enctype="multipart/form-data">
            <div class="form">
                <strong>Escolha <br><input type="text" name="escolha" required><br>

                <strong>ID <br><input type="text" name="id_historia" required><br>
            </div>
            <br> <br>
            <div class="enviar"><input type="submit" value="Cadastrar"></div>
        </form>
    </fieldset>
</body>

</html>