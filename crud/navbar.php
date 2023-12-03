<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
    <title>PPI</title>
    </head>
<body>
<header>
    <nav>
      <ul class="menu">
        <li class="home"><a href="../jogo/jogoADM.php"><img src="../img/logo.png" width="90px" height="auto"></a></li>
        <div id="menu">
          <li class="cadastrar-historia"><a href="cadHistoria.php" class="cadastrar-historia">Cadastrar Historia</a></li>
          <li class="cadastrar-escolha"><a href="cadEscolhas.php" class="cadastrar-escolha">Cadastrar Escolha</a></li>
          <li class="listarH" id="historias"><a class="listarH">Histórias</a>
            <ul class="submenu">
              <li><a href="listarH.php" class="listarH">Histórias PT</a></li>
              <li><a href="listarHen.php" class="listarH">Histórias En</a></li>
            </ul>
          </li>
          <li class="listarE" id="escolha"><a class="listarE">Escolhas</a>
            <ul class="submenuE">
              <li><a href="listarE.php" class="listarE">Escolhas PT</a></li>
              <li><a href="listarEen.php" class="listarE">Escolhas En</a></li>
            </ul>
          </li>
          <li class="listarU"><a href="listarU.php" class="listarU">Usuário</a></li>
        </div>
      </ul>
    </nav>
  </header>

  <script>
    // Para exibir e ocultar o submenu de Histórias
    document.getElementById('historias').addEventListener('click', function(event) {
      var submenu = this.querySelector('.submenu');
      if (submenu.style.display === 'none') {
        submenu.style.display = 'block';
      } else {
        submenu.style.display = 'none';
      }
      event.stopPropagation(); // Evita que o evento seja propagado para elementos pais
    });

    // Para fechar o submenu clicando fora dele
    document.addEventListener('click', function(event) {
      var submenu = document.querySelector('.submenu');
      var historias = document.getElementById('historias');
      if (event.target !== submenu && event.target !== historias) {
        submenu.style.display = 'none';
      }
    });
  </script>
  <script>
    // Para exibir e ocultar o submenu de Histórias
    document.getElementById('escolha').addEventListener('click', function(event) {
      var submenuE = this.querySelector('.submenuE');
      if (submenuE.style.display === 'none') {
        submenuE.style.display = 'block';
      } else {
        submenuE.style.display = 'none';
      }
      event.stopPropagation(); // Evita que o evento seja propagado para elementos pais
    });

    // Para fechar o submenu clicando fora dele
    document.addEventListener('click', function(event) {
      var submenuE = document.querySelector('.submenuE');
      var escolha = document.getElementById('escolha');
      if (event.target !== submenuE && event.target !== escolha) {
        submenuE.style.display = 'none';
      }
    });
  </script>
</body>
</html>