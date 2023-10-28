<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/form.css">
    <title>PPI</title>
</head>

<body>
    <?php require_once "navbar.php"; ?>
    <style>
        nav ul .cadastrar-escolha {
            background: white;
            border-radius: 5px 5px 5px 5px;
        }
    </style>
        <form action="cadastrarEscolha.php" method="post">
            <div class="form">
                <strong>Escolha <br><input type="text" name="escolha" required><br>

                    <strong>ID <br><input type="text" name="id_historia" required><br>
            </div>
            <br> <br>
            <div class="enviar"><input type="submit" value="Cadastrar"></div>
        </form>
</body>

</html>