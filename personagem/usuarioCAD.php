<?php
require_once __DIR__.'/../bootstrap.php';require_login('../');if($_SERVER['REQUEST_METHOD']!=='POST')redirect('index.php');check_csrf();
$name=trim((string)($_POST['nome']??''));$img=(string)($_POST['imagem']??'');
if($name===''||(function_exists("mb_strlen")?mb_strlen($name):strlen($name))>40||!in_array($img,['personagem-masc.png','personagem-fem.png'],true))redirect('index.php?erro=campos');
$id=(int)$_SESSION['user_id'];$st=db()->prepare('UPDATE usuario SET nome=?,imagem=? WHERE id_usuario=?');$st->bind_param('ssi',$name,$img,$id);$st->execute();redirect('../menu.php');
