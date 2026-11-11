<?php
declare(strict_types=1);
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_set_cookie_params(['httponly'=>true,'secure'=>!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off','samesite'=>'Lax','path'=>'/']);
    session_start();
}
require_once __DIR__.'/config.php';
function db(): mysqli {
    static $db = null;
    if ($db instanceof mysqli) return $db;
    global $config;
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try { $db = new mysqli($config['host'],$config['user'],$config['pass'],$config['db']); $db->set_charset('utf8mb4'); }
    catch (Throwable $e) { http_response_code(503); exit('Banco indisponível. Importe sql/ppi.sql e confira config.php.'); }
    return $db;
}
function h(?string $value): string {return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');}
function csrf(): string {if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32)); return $_SESSION['csrf'];}
function check_csrf(): void {if(!hash_equals(csrf(),(string)($_POST['csrf']??''))){http_response_code(403);exit('Sessão expirada. Volte e tente novamente.');}}
function redirect(string $url): never {header('Location: '.$url);exit;}
function logged(): bool {return isset($_SESSION['user_id']) && (int)$_SESSION['user_id']>1;}
function require_login(string $prefix=''): void {if(!logged())redirect($prefix.'index.php?erro=login');}
function user(): ?array {if(!logged()) return null; $st=db()->prepare('SELECT id_usuario,nome,email,imagem FROM usuario WHERE id_usuario=?');$id=(int)$_SESSION['user_id'];$st->bind_param('i',$id);$st->execute();return $st->get_result()->fetch_assoc()?:null;}
function is_admin(): bool {return logged() && !empty($_SESSION['is_admin']);}
function require_admin(): void {require_login();if(!is_admin()){http_response_code(403);exit('Acesso restrito ao administrador.');}}
function get_scene(int $id,int $lang): ?array {$table=$lang===2?'historiaen':'historia';$st=db()->prepare("SELECT * FROM $table WHERE id_historia=?");$st->bind_param('i',$id);$st->execute();return $st->get_result()->fetch_assoc()?:null;}
function get_choices(int $id,int $lang): array {$table=$lang===2?'escolhasen':'escolhas';$st=db()->prepare("SELECT * FROM $table WHERE id_historia=? ORDER BY id_escolha");$st->bind_param('i',$id);$st->execute();return $st->get_result()->fetch_all(MYSQLI_ASSOC);}
function asset(?string $name): string { $name=basename(str_replace('\\','/',(string)$name));return $name!==''?'img/'.rawurlencode($name):'';}
function titlebar(string $path='',string $active=''): void {?>
<header class="topbar"><a class="brand" href="<?=h($path)?>menu.php"><img src="<?=h($path)?>img/EC.png" alt="EC"><span>ENIGMA <b>CAPITAL</b></span></a><nav><a href="<?=h($path)?>menu.php" <?= $active==='home'?'aria-current="page"':''?>>Início</a><?php if(logged()): ?><a href="<?=h($path)?>personagem/index.php">Personagem</a><?php if(is_admin()):?><a href="<?=h($path)?>admin.php">Estúdio</a><?php endif;?><a href="<?=h($path)?>sair.php">Sair</a><?php else: ?><a href="<?=h($path)?>index.php">Entrar</a><?php endif;?></nav></header>
<?php }
function page_start(string $title,string $prefix=''): void { ?>
<!doctype html><html lang="pt-BR"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="theme-color" content="#0d101b"><link rel="icon" href="<?=h($prefix)?>img/EC.png"><link rel="stylesheet" href="<?=h($prefix)?>css/enigma.css"><title><?=h($title)?> | Enigma Capital</title></head><body><?php titlebar($prefix); }
function page_end(): void { echo '</body></html>'; }
