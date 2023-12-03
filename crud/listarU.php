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
    nav ul .listarU {
      background: white;
      border-radius: 5px 5px 5px 5px;
      color: black;
    }
  </style>
  <?php require_once "navbar.php";

  //Conectar ao banco
  include("../conecta.php");

  //Seleciona todos os dados da tabela lista
  $sql = "SELECT * FROM usuario";
  //executa o select
  $resultado = mysqli_query($conexao, $sql);

  //lista os itens
  echo ' <div class="table">
  <table>
    <tr>
    <strong>
      <th scope="col">Id Usuário</th>
      <th scope="col">Nome</th>
      <th scope="col">Imagem</th>
      <th scope="col">Email</th>
      <th scope="col">Senha</th>
      <th scope="col">Opções</th>
    </strong>
    </tr>';

  while ($dados = mysqli_fetch_assoc($resultado)) {
    echo "<td> " . $dados['id_usuario'] . " </td>";
    echo "<td> " . $dados['nome'] . "</td>";
    echo "<td> " . $dados['imagem'] . "</td>";
    echo "<td> " . $dados['email'] . "</td>";
    echo "<td> " . $dados['senha'] . "</td>";
    echo "<td><a href='../crud/editarU.php?id_usuario=" . $dados['id_usuario'] . "'>" . "<img src='../img/settings.png' widht='20' height='20'" . "</a>";
    echo "<a href='../crud/excluirUsuario.php?id_usuario=" . $dados['id_usuario'] . "'>" . "<img src='../img/lixeira.png' widht='20' height='20'" . "</a></td>";
    echo '</tr>';
  }
  echo '</table>
</div>';

  ?>

</body>

</html>