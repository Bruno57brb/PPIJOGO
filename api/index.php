<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');
ini_set('display_errors', '0');
ini_set('session.use_strict_mode','1');
ini_set('session.use_only_cookies','1');
if (session_status() !== PHP_SESSION_ACTIVE) {
 session_name('ENIGMA_SESSION');
 session_set_cookie_params(['httponly'=>true,'secure'=>!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off','samesite'=>'Lax','path'=>'/']);
 session_start();
}
function reply(int $status, array $payload): never { http_response_code($status);echo json_encode($payload,JSON_UNESCAPED_UNICODE|JSON_INVALID_UTF8_SUBSTITUTE);exit;}
function csrf(): string {if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(24));return (string)$_SESSION['csrf'];}
function body(): array {if((int)($_SERVER['CONTENT_LENGTH']??0)>120000)reply(413,['error'=>'Dados grandes demais.']);$v=json_decode(file_get_contents('php://input')?:'',true);if(!is_array($v))reply(400,['error'=>'JSON inválido.']);return $v;}
function db(): PDO {static $pdo=null;if($pdo)return $pdo;$file=dirname(__DIR__).'/config.php';if(!is_file($file))reply(503,['error'=>'Sincronização indisponível. Configure config.php e importe database/schema.sql.']);$c=require $file;try{$pdo=new PDO(sprintf('mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4',$c['db_host'],$c['db_port'],$c['db_name']),$c['db_user'],$c['db_password'],[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_EMULATE_PREPARES=>false]);return $pdo;}catch(Throwable $e){reply(503,['error'=>'Não foi possível conectar ao banco de dados.']);}}
function uid(): int {if(empty($_SESSION['user_id']))reply(401,['error'=>'Entre na sua conta primeiro.']);return (int)$_SESSION['user_id'];}
$action=(string)($_GET['action']??'status');$method=$_SERVER['REQUEST_METHOD']??'GET';
if($method==='GET'&&$action==='status'){reply(200,['ok'=>true,'user'=>isset($_SESSION['user_id'])?['id'=>(int)$_SESSION['user_id'],'username'=>(string)($_SESSION['username']??'')]:null,'csrf'=>csrf()]);}
if($method!=='POST')reply(405,['error'=>'Método não permitido.']);
// Valida o token para evitar POSTs de terceiros usando cookies existentes.
$token=(string)($_SERVER['HTTP_X_CSRF_TOKEN']??'');if(!hash_equals(csrf(),$token))reply(403,['error'=>'Token de segurança inválido. Atualize a página.']);
$d=body();
if($action==='register'){
 $username=trim((string)($d['username']??''));$email=mb_strtolower(trim((string)($d['email']??'')));$password=(string)($d['password']??'');
 if(mb_strlen($username)<2||mb_strlen($username)>60||!filter_var($email,FILTER_VALIDATE_EMAIL)||strlen($password)<8||strlen($password)>200)reply(422,['error'=>'Informe nome, e-mail válido e senha com pelo menos 8 caracteres.']);
 try{$st=db()->prepare('INSERT INTO players(username,email,password_hash) VALUES(?,?,?)');$st->execute([$username,$email,password_hash($password,PASSWORD_DEFAULT)]);}catch(PDOException $e){if($e->getCode()==='23000')reply(409,['error'=>'Este e-mail já está cadastrado.']);reply(500,['error'=>'Erro ao cadastrar.']);}
 session_regenerate_id(true);$_SESSION['user_id']=(int)db()->lastInsertId();$_SESSION['username']=$username;reply(200,['ok'=>true,'username'=>$username]);
}
if($action==='login'){
 $email=mb_strtolower(trim((string)($d['email']??'')));$password=(string)($d['password']??'');
 $st=db()->prepare('SELECT id,username,password_hash FROM players WHERE email=? LIMIT 1');$st->execute([$email]);$u=$st->fetch();if(!$u||!password_verify($password,$u['password_hash']))reply(401,['error'=>'E-mail ou senha incorretos.']);
 session_regenerate_id(true);$_SESSION['user_id']=(int)$u['id'];$_SESSION['username']=$u['username'];reply(200,['ok'=>true,'username'=>$u['username']]);
}
if($action==='logout'){$_SESSION=[];session_regenerate_id(true);reply(200,['ok'=>true]);}
if($action==='save'){
 $id=uid();$s=$d['state']??null;if(!is_array($s)||!isset($s['scene'],$s['avatar'])||!is_string($s['scene'])||!preg_match('/^[a-z_]{2,40}$/',$s['scene'])||!is_array($s['avatar']))reply(422,['error'=>'Salvamento inválido.']);
 $json=json_encode($s,JSON_UNESCAPED_UNICODE|JSON_INVALID_UTF8_SUBSTITUTE);if(!$json||strlen($json)>90000)reply(413,['error'=>'Salvamento inválido ou grande demais.']);
 $visited=is_array($s['visited']??null)?min(999,count($s['visited'])):0;$clues=is_array($s['clues']??null)?min(99,count($s['clues'])):0;$endings=is_array($s['endings']??null)?min(4,count($s['endings'])):0;
 $st=db()->prepare('INSERT INTO saves(player_id,payload,scenes_visited,clues_found,endings_found) VALUES(?,?,?,?,?) ON DUPLICATE KEY UPDATE payload=VALUES(payload),scenes_visited=VALUES(scenes_visited),clues_found=VALUES(clues_found),endings_found=VALUES(endings_found)');$st->execute([$id,$json,$visited,$clues,$endings]);reply(200,['ok'=>true]);
}
if($action==='load'){$st=db()->prepare('SELECT payload,updated_at FROM saves WHERE player_id=?');$st->execute([uid()]);$row=$st->fetch();reply(200,['ok'=>true,'state'=>$row?json_decode($row['payload'],true):null,'updated_at'=>$row['updated_at']??null]);}
reply(404,['error'=>'Ação desconhecida.']);
