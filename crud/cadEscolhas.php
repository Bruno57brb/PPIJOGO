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
            color: black;
        }
    </style>
        <form action="cadastrarEscolha.php" method="post">
            <div class="form">
                <strong>Escolha <br><textarea name="nome" rows="5" cols="30" required></textarea><br>
                    ID História <br><input type="text" name="id_historia" required><br>
                    ID Destino <br><input type="text" name="id_destino" required><br>
                    ID Escolha </strong><br><input type="text" name="id_escolha" required><br>
            </div>
            <br> <br>
            <div class="enviar"><input type="submit" value="Cadastrar"></div>
        </form>
</body>

</html>