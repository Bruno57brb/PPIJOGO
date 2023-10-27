<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>PPI</title>
</head>

<body>

  <?php

  //Conectar ao banco
  include("../conecta.php");

  //Seleciona todos os dados da tabela lista
  $sql = "SELECT * FROM escolhas";
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
    echo "<td> " . $dados['id_escolhas'] . " </td>";
    echo "<td> " . $dados['texto'] . "</td>";
    echo "<td><a href='editarEscolhas.php?id=" . $dados['id_escolhas'] . "&escolhas=" . $dados['escolhas'] . "'>" . "<img src='img/settings.png' widht='20' height='20'" . "</a>";
    echo " <a href='excluirEscolhas.php?id=" . $dados['id_escolhas'] . "'>" . "<img src='img/lixeira.png' widht='20' height='20'" . "</a></td>";
    echo '</tr>';
  }
  echo '</table>
</div>';

  ?>

</body>

</html>