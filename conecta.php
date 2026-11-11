<?php
require_once __DIR__.'/bootstrap.php';
function conectar(): mysqli { return db(); }
function executarSQL(mysqli $conexao,string $sql): mysqli_result|bool {return $conexao->query($sql);}
$conexao = db();
