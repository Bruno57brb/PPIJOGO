<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/navbar.css">
  <title>PPI</title>
</head>

<body>

  <?php
  require_once "navbar.php";
  //Conectar ao banco
  include("../conecta.php");

  //Seleciona todos os dados da tabela lista
  $sql = "SELECT * FROM historia";
  //executa o select
  $resultado = mysqli_query($conexao, $sql);

  //lista os itens
  echo ' <div class="table">
  <table>
    <tr>
    <strong>
      <th scope="col">Id</th>
      <th scope="col">Texto</th>
      <th scope="col">Opções</th>
    </strong>
    </tr>';

  while ($dados = mysqli_fetch_assoc($resultado)) {
    echo "<td> " . $dados['id_historia'] . " </td>";
    echo "<td> " . $dados['texto'] . "</td>";
    echo "<td><a href='../crud/editarH.php?id_historia=" . $dados['id_historia'] . "&texto=" . $dados['texto'] . "'>" . "<img src='../img/settings.png' widht='20' height='20'" . "</a>";
    echo " <a href='../crud/excluirHistoria.php?id_historia=" . $dados['id_historia'] . "'>" . "<img src='../img/lixeira.png' widht='20' height='20'" . "</a></td>";
    echo '</tr>';
  }
  echo '</table>
</div>';

  ?>

</body>

</html>