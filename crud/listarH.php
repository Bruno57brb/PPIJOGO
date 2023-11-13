<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="../css/form.css">
  <link rel="stylesheet" href="../css/listar.css">
  <title>PPI</title>
</head>

<body>

  <style>
    nav ul .listarH {
      background: white;
      border-radius: 5px 5px 5px 5px;
      color: black;
    }
  </style>
  <?php require_once "navbar.php";

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
      <th scope="col">Id História</th>
      <th scope="col">Texto</th>
      <th scope="col">Cenário</th>
      <th scope="col">Personagem</th>
      <th scope="col">Nome</th>
      <th scope="col">Opções</th>
    </strong>
    </tr>';

  while ($dados = mysqli_fetch_assoc($resultado)) {
    echo "<td> " . $dados['id_historia'] . " </td>";
    echo "<td> " . $dados['texto'] . "</td>";
    echo "<td>" . $dados['cenario'] . "</td>";
    echo "<td>" . $dados['personagem'] . "</td>";
    echo "<td>" . $dados['nome'] . "</td>";
    echo "<td><a href='../crud/editarH.php?id_historia=" . $dados['id_historia'] . "&texto=" . $dados['texto'] . "'>" . "<img src='../img/settings.png' widht='20' height='20'" . "</a>";
    echo " <a href='../crud/excluirHistoria.php?id_historia=" . $dados['id_historia'] . "'>" . "<img src='../img/lixeira.png' widht='20' height='20'" . "</a></td>";
    echo '</tr>';
  }
  echo '</table>
</div>';

  ?>

</body>

</html>