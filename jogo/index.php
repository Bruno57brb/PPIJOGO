<?php require_once __DIR__.'/../bootstrap.php';require_login('../');redirect('../menu.php'.(isset($_GET['lang'])?'?lang='.(int)$_GET['lang']:''));
