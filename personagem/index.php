<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/usuario.css">
  <link rel="shortcut icon" href="../img/EC.png">
  <script src="java.js"></script>
  <title>Enigma Capital</title>
</head>
<?php
include("../conecta.php");
$sql = "SELECT * FROM usuario WHERE id_usuario=" . $_SESSION['id'];
$resultado = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultado);

$genero = (isset($_GET['genero']) ? $_GET['genero'] : 1);
if ($genero == 1) {
  $img = "personagem-masc.png";
} else if ($genero == 2) {
  $img = "personagem-fem.png";
}
?>

<body>
  <img class="logo" src="../img/enigma-branco" width="220px" height="auto">
<h1 class="personagem">Selecione seu personagem: </h1>

  <form action="usuarioCAD.php" method="POST">
    <div class="nome">
      <label class="label-nome">
        <span>Nome</span>
        <input type="text" name="nome" class="input" required value="<?php echo $usuario['nome']; ?>">
        <input type="hidden" name="imagem" value="<?php echo $img; ?>" required>
      </label>
    </div>

    <button type="submit" class="iniciar">INICIAR</button>
  </form>
<div class="borda-fem">
  <?php if($genero ==2){ ?>
    <a href="index.php?genero=2"><img class="img-fem-active" src="../img/personagem-fem.png" width="300px" height="auto"></a>
    <?php }else{ ?>
      <a href="index.php?genero=2"><img class="img-fem" src="../img/personagem-fem.png" width="300px" height="auto"></a>
    <?php } ?>
</div>
<div class="borda-masc">
  <?php if($genero == 1){ ?>
      <a href="index.php?genero=1"><img class="img-masc-active"src="../img/personagem-masc.png" width="300px" height="auto"></a>
    <?php }else{ ?>
      <a href="index.php?genero=1"><img class="img-masc"src="../img/personagem-masc.png" width="300px" height="auto"></a>
    <?php } ?>
</div>
<h1 class="nome-escolha">Insira o nome do seu <br><center>personagem:</center></h1>

</body>
<script>
  const inputs = document.querySelectorAll('.input');

  const handleFocus = ({ target }) => {
    const span = target.previousElementSibling;
    span.classList.add('span-active');
  }

  const handleFocusOut = ({ target }) => {
    if (target.value === '') {
      const span = target.previousElementSibling;
      span.classList.remove('span-active');
    }
  }

  const handleChange = () => {
    const [username, password] = inputs;

    if (username.value && password.value.length >= 8) {
      button.removeAttribute('disabled');
    } else {
      button.setAttribute('disabled', '');
    }
  }

  inputs.forEach((input) => input.addEventListener('focus', handleFocus));
  inputs.forEach((input) => input.addEventListener('focusout', handleFocusOut));
  inputs.forEach((input) => input.addEventListener('input', handleChange));
</script>

</html>