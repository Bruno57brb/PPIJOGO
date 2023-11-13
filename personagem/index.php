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

<body>
    <div class="fundo-1"></div>
    <div class="fundo-2"></div>


    <div class="nome">


        <form>
            <p><label class="label-nome">
                    <span>Nome</span>
                    <input type="text" name="nome" class="input">
                </label></p>
        </form>



    </div>
    <div class="fundo"> </div>
    <div class="genero-f">
        <img src="../img/personagem-fem.png" width="400px" height="400px">
    </div>

    <div class="icone_fem">
        <img src="../img/icone_femenino.png" width="110px" height="110px">
    </div>

    <div class="icone_mas">
        <img src="../img/icone_masculino.png" width="110px" height="110px">
    </div>

    <div class="borda"></div>

    <button type="button" class="iniciar"><a href="jogo.php">INICIAR</a></button>
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