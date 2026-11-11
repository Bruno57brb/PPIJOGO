<?php
require_once __DIR__.'/../bootstrap.php';
if($_SERVER['REQUEST_METHOD']!=='POST')redirect('../index.php');check_csrf();
$email=strtolower(trim((string)($_POST['email']??$_POST['usuario']??'')));$pass=(string)($_POST['senha']??'');
if(!filter_var($email,FILTER_VALIDATE_EMAIL)||$pass==='')redirect('../index.php?erro=campos');
$stmt=db()->prepare('SELECT id_usuario,email,senha FROM usuario WHERE email=? AND id_usuario>1 LIMIT 1');$stmt->bind_param('s',$email);$stmt->execute();$row=$stmt->get_result()->fetch_assoc();
$ok=$row && (password_verify($pass,$row['senha']) || (strlen($row['senha'])<60 && hash_equals((string)$row['senha'],$pass)));
if(!$ok)redirect('../index.php?erro=credenciais');
// Migração automática de contas antigas que armazenavam senhas em texto simples.
if(!password_get_info($row['senha'])['algo']){$hash=password_hash($pass,PASSWORD_DEFAULT);$st=db()->prepare('UPDATE usuario SET senha=? WHERE id_usuario=?');$uid=(int)$row['id_usuario'];$st->bind_param('si',$hash,$uid);$st->execute();}
session_regenerate_id(true);$_SESSION['user_id']=(int)$row['id_usuario'];global $config;$_SESSION['is_admin']=($config['admin_email']!=='' && hash_equals(strtolower($config['admin_email']),$email));
$u=user();redirect(empty($u['nome'])?'../personagem/index.php':'../menu.php');
