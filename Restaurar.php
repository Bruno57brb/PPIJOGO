<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <link rel="stylesheet" href="css/style2.css">
  <link rel="shortcut icon" href="img/EC.png">
  <script src="script.js" defer></script>
  <title>Login</title>
</head>

<body>
  <div id="box">
    <div id="logo">
      <img src="img/enigma.png" alt="logo2">
    </div>
    <form id="login" class="input-group" action="login/login.php" method="POST">
      <input type="email" name="usuario" placeholder="Seu Email" class="input-field" required>
      <input type="password" name="senha" placeholder="Sua senha" class="input-field" required>
      <button type="submit" class="btn">RESTAURAR</button>
      <div id="pes">
      <p>DESEJA VOLTAR ? <a href="index.php" onclick="recover()">CLIQUE AQUI</a></p>
        <p>NÃO ESTÁ REGISTRADO? <a href="criar.php" onclick="register()">REGISTRAR-SE</a></p>
      </div>
    </form>
  </div>

  <script>
    function recover() {
      // Função para recuperação de senha
    }

    function register() {
      // Função para registro de novo usuário
    }
  </script>
</body>

</html>