<?php
require_once __DIR__.'/../bootstrap.php';require_login('../');
$u=user();$lang=(int)($_GET['lang']??1);$lang=in_array($lang,[1,2],true)?$lang:1;$sceneId=filter_var($_GET['id_destino']??-1,FILTER_VALIDATE_INT);$sceneId=$sceneId===false?-1:$sceneId;
$scene=get_scene($sceneId,$lang);if(!$scene){http_response_code(404);page_start('Cena não encontrada','../');echo '<main class="empty-state panel"><h1>Cena não encontrada</h1><p>Este capítulo não está disponível.</p><a class="btn primary" href="../menu.php">Voltar ao menu</a></main>';page_end();exit;}
$choices=get_choices($sceneId,$lang);
// Referências a NPCs nas escolhas antigas agora são resolvidas no servidor, não em parâmetros externos.
$npc=['0'=>'Edson','-1'=>'André'];$character=(string)($u['nome']?:'Investigador');$displayName=$scene['nome']?:($lang===2?'Narrator':'Narrador');
$replace=static fn(?string $s):string=>str_replace('P.P',$character,(string)$s);
$media=static fn(?string $s):string=>($s && is_file(__DIR__.'/../img/'.basename($s)))?'../'.asset($s):'';
$bg=$media($scene['cenario']);$portrait=$media($scene['personagem']);$video=$media($scene['video']);$playerImage=$media($u['imagem']);
page_start('Capítulo '.$sceneId,'../');
?>
<main class="game" id="game" style="--scene-bg:<?=h($bg!==''?'url("'.$bg.'")':'none')?>"><div class="game-shade"></div><div class="game-top"><a class="game-back" href="../menu.php">← Menu principal</a><div class="chapter-label">ENIGMA CAPITAL <span>•</span> <?= $lang===2?'CHAPTER':'CENA'?> <?=h((string)$sceneId)?></div><div class="game-tools"><button type="button" id="soundToggle" aria-label="Alternar som" title="Alternar som">♫</button><button type="button" id="textToggle" aria-label="Mostrar diálogo instantaneamente" title="Pular animação">⚡</button></div></div>
<?php if($video):?><video id="sceneVideo" class="scene-video" playsinline loop muted autoplay><source src="<?=h($video)?>" type="video/mp4"></video><?php endif;?>
<?php if($portrait):?><img class="scene-portrait" src="<?=h($portrait)?>" alt="<?=h($displayName)?>"><?php endif;?>
<div class="game-bottom"><div class="story-panel"><div class="speaker"><span class="speaker-dot"></span><?=h($displayName)?></div><p id="storyText" class="story-text" data-text="<?=h($replace($scene['texto']))?>"></p><span class="continue-hint">▼ <?= $lang===2?'CHOOSE YOUR PATH':'ESCOLHA SEU CAMINHO' ?></span></div><div class="choice-panel"><div class="choice-head"><?= $lang===2?'WHAT DO YOU DO NEXT?':'QUAL SERÁ SUA PRÓXIMA DECISÃO?' ?></div><?php if($choices):?><?php foreach($choices as $choice):?><a class="choice" href="<?= ((int)$choice['id_destino']===-5 && $sceneId===-5)?'../menu.php':'jogo.php?id_destino='.(int)$choice['id_destino'].'&lang='.$lang ?>"><span class="choice-arrow">↗</span><span><?=h($replace($choice['escolha']))?></span></a><?php endforeach;?><?php else:?><p class="muted"><?= $lang===2?'This is the end of this branch.':'Este é o final deste caminho.'?></p><a class="choice" href="../menu.php">↻ <?= $lang===2?'Play again':'Jogar novamente'?></a><?php endif;?></div></div></main>
<?php if($scene['musica']==='1'):?><audio id="sceneAudio" loop preload="none" src="../img/Lost%20Painting.mp3"></audio><?php endif;?>
<script src="../JavaScript/game.js" defer></script><script>window.ENIGMA_SCENE={id:<?=json_encode($sceneId)?>,lang:<?=json_encode($lang)?>};</script>
<?php page_end(); ?>
