<?php
require_once __DIR__.'/bootstrap.php';
if(logged())redirect('menu.php');
$erro = (string)($_GET['erro']??'');
page_start('Entrar');
?>
<main class="auth-layout"><div class="auth-art"><span class="eyebrow">UM SEGREDO ESCONDIDO EM BRASÍLIA</span><img class="cover-logo" src="img/Enigma-branco.png" alt="Enigma Capital"><h1>Cada escolha revela um novo pedaço da verdade.</h1><p>Uma história interativa de mistério e investigação. Seu caminho, suas consequências.</p><div class="hero-tags"><span>✦ Narrativa interativa</span><span>✦ Múltiplos caminhos</span><span>✦ PT / EN</span></div></div>
<section class="panel auth-panel"><span class="eyebrow">BEM-VINDO AO ENIGMA</span><h2>Entre na investigação</h2><p class="muted">Acesse seu perfil para começar ou continuar a história.</p>
<?php if($erro): ?><p class="alert" role="alert"><?=h(match($erro){'login'=>'Entre na sua conta para jogar.','credenciais'=>'E-mail ou senha incorretos.','duplicado'=>'Este e-mail já está cadastrado.','campos'=>'Preencha os campos corretamente.',default=>'Não foi possível concluir a operação.'})?></p><?php endif; ?>
<form method="post" action="login/login.php" class="stack"><input type="hidden" name="csrf" value="<?=h(csrf())?>"><label>E-mail<input type="email" name="email" placeholder="voce@email.com" autocomplete="email" required maxlength="255"></label><label>Senha<input type="password" name="senha" placeholder="Sua senha" autocomplete="current-password" required></label><button class="btn primary" type="submit">Entrar no jogo <span>↗</span></button></form><p class="switch-auth">Novo por aqui? <a href="criar.php">Criar conta</a></p><p class="muted small">Jogo desenvolvido originalmente como projeto acadêmico.</p></section></main>
<?php page_end(); ?>
