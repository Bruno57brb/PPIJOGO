<?php

session_start();
if(empty($_SESSION)){
   header ('Location: ../index.php');
}
?>  


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
<?php
echo"ola," . $_SESSION["nome"];
echo "<a href='../index.php'>"

?>

</body>
</html>