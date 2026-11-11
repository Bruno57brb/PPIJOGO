<?php
$config = [
 'host'=>getenv('ENIGMA_DB_HOST') ?: '127.0.0.1',
 'user'=>getenv('ENIGMA_DB_USER') ?: 'root',
 'pass'=>getenv('ENIGMA_DB_PASSWORD') ?: '',
 'db'=>getenv('ENIGMA_DB_NAME') ?: 'ppi',
 // Defina ENIGMA_ADMIN_EMAIL no ambiente do servidor. Não existe admin padrão.
 'admin_email'=>getenv('ENIGMA_ADMIN_EMAIL') ?: '',
];
