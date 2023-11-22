
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="script.js" defer></script>

  <title>LOGIN</title>
</head>

<body>
  
  <div class="content-page">
    
    <div class="body-content">

      <div class="container">

       <div class="title title-white">LOGIN</div>

       <form action="sistema_login/login.php" method="POST">
       <p><label class="login__label">
         <span>E-mail</span>
         <input type="email" name="email" class="input">
       </label></p>
       
       <p><label class="login__label">
         <span>Senha</span>
         <input type="password" name="senha" class="input">
       </label></p>
     
       <button type="submit" class="login__button" disabled>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                      d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z" />
                  </svg>
                </button>
       
      
      
    
          
</form>
       <h1 class="tamanho"> <a href="Restaurar.php" class="login__link">restaurar conta</a>
        <a href="criar.php" class="login__link">criar conta</a></h1>
     
</body>

</html>


