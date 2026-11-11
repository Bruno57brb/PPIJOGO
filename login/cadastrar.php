<?php
require_once __DIR__.'/../bootstrap.php';
if($_SERVER['REQUEST_METHOD']!=='POST')redirect('../criar.php');check_csrf();
$email=strtolower(trim((string)($_POST['email']??$_POST['usuario']??'')));$pass=(string)($_POST['senha']??$_POST['password']??'');
if(!filter_var($email,FILTER_VALIDATE_EMAIL)||strlen($pass)<8)redirect('../criar.php?erro=campos');
$hash=password_hash($pass,PASSWORD_DEFAULT);$nome='';$img='personagem-masc.png';
try{$st=db()->prepare('INSERT INTO usuario(nome,imagem,email,senha) VALUES(?,?,?,?)');$st->bind_param('ssss',$nome,$img,$email,$hash);$st->execute();}
catch(mysqli_sql_exception $e){redirect('../criar.php?erro=duplicado');}
session_regenerate_id(true);$_SESSION['user_id']=(int)db()->insert_id;global $config;$_SESSION['is_admin']=($config['admin_email']!=='' && hash_equals(strtolower($config['admin_email']),$email));redirect('../personagem/index.php');
