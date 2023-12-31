<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="../css/form.css">
  <link rel="stylesheet" href="../css/listar.css">
  <link rel="shortcut icon" href="../img/EC.png">
  <title>PPI</title>
</head>

<body>
  <style>
    nav ul .listarE {
      background: white;
      border-radius: 5px 5px 5px 5px;
      color: black;
    }
  </style>
  <?php
  require_once "navbar.php";

  //Conectar ao banco
  include("../conecta.php");

  //Seleciona todos os dados da tabela lista
  $sql = "SELECT * FROM escolhasen";
  //executa o select
  $resultado = mysqli_query($conexao, $sql);
  $lang = 2;
  //lista os itens
  echo ' <div class="table">
  <table>
    <tr>
    <strong>
      <th scope="col">Id Historia</th>
      <th scope="col">Id Escolha</th>
      <th scope="col">Id Destino</th>
      <th scope="col">Texto</th>
      <th scope="col">Opções</th>
    </strong>
    </tr>';

  while ($dados = mysqli_fetch_assoc($resultado)) {
    echo "<td> " . $dados['id_historia'] . " </td>";
    echo "<td>" . $dados['id_escolha'] . " </td>";
    echo "<td>" . $dados['id_destino'] . " </td>";
    echo "<td> " . $dados['escolha'] . "</td>";
    echo "<td><a href='../crud/editarE.php?id_escolha=" . $dados['id_escolha'] . "&lang=" . $lang ."'>" . "<img src='../img/settings.png' widht='20' height='20'" . "</a>";
    echo " <a href='../crud/excluirEscolhas.php?id_escolha=" . $dados['id_escolha'] . "'>" . "<img src='../img/lixeira.png' widht='20' height='20'" . "</a></td>";
    echo '</tr>';
  }
  echo '</table>
</div>';

  ?>

</body>

</html>