<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/usuario.css">
  <script src="java.js"></script>
  <title>Enigma Capital</title>
</head>
<?php
include("../conecta.php");
$sql = "SELECT * FROM usuario WHERE id_usuario=".$_SESSION['id'];
$resultado = mysqli_query($conexao, $sql);

$genero = (isset($_GET['genero']) ? $_GET['genero'] : 1);
if ($genero == 1) { $img = "personagem-masc.png"; }
else if ($genero == 2) { $img = "personagem-fem.png"; }
?>

<body>
  <div class="fundo-1"></div>
  <div class="fundo-2"></div>


  <div class="nome">

    <form action="usuarioCAD.php" method="POST">
      <p><label class="label-nome">
          <span>Nome</span>
          <input type="text" name="nome" class="input" required>
          <input type="hidden" name="imagem" value="<?php echo $img; ?>" required>
        </label></p>

        <button type="submit" class="iniciar">INICIAR</button>
      </form>
      
    </div>
    <div class="fundo"> </div>
    <div class="genero">
      <?php
    if ($genero == "2") { ?>
      <img src="../img/<?php echo $img; ?>" width="400px" height="400px">
    <?php } else { ?>
      <img src="../img/<?php echo $img; ?>" width="400px" height="400px">
    <?php } ?>
  </div>


  <button type="button" class="icone_fem">
    <a href="index.php?genero=2"><img src="../img/icone_femenino.png" width="110px" height="110px"></a>
  </button>


  <button type="button" class="icone_mas">
    <a href="index.php?genero=1"><img src="../img/icone_masculino.png" width="110px" height="110px"></a>
  </button>


  <div class="borda"></div>


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