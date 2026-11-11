# ENIGMA CAPITAL — Edição Renovada

Projeto acadêmico original desenvolvido por **Antonio Mongelo, Bruno Bitencourt, Laura Oliveira e Lorenzo Marty**. A história e as ilustrações foram preservadas. Nesta versão, a interface e os fluxos de login, cadastro, personalização, jogo e administração foram reconstruídos.

## Requisitos
- PHP 8.1 ou superior, extensão `mysqli` e `mbstring`.
- MySQL 8 ou MariaDB recente.
- Apache/WampServer ou servidor PHP configurado.

## Instalar no WampServer
1. Extraia a pasta `EnigmaCapital` em `C:\\wamp64\\www\\`.
2. Inicie Apache e MySQL no WampServer.
3. No phpMyAdmin, crie o banco **ppi**, com charset `utf8mb4` e collation `utf8mb4_unicode_ci`.
4. Importe **sql/ppi.sql**. A versão distribuída remove as credenciais pessoais que estavam no dump antigo.
5. Confira o arquivo `config.php` (banco `ppi`, usuário `root`, senha vazia no Wamp local).
6. Acesse `http://localhost/EnigmaCapital/`. Cadastre um novo usuário, escolha um personagem e comece a jogar.

## Estúdio administrativo
Por segurança, **nenhum e-mail é administrador automaticamente**. Configure a variável de ambiente `ENIGMA_ADMIN_EMAIL` com o e-mail desejado, reinicie o Apache e entre nessa conta. O botão **Estúdio** aparece no menu. O estúdio permite editar/criar/excluir cenas e decisões nas versões PT e EN e consultar jogadores. Os arquivos antigos em `crud/` não executam mais operações inseguras.

### Exemplo de variável em Apache local (VirtualHost)
`SetEnv ENIGMA_ADMIN_EMAIL admin@exemplo.com`

Defina também `ENIGMA_DB_HOST`, `ENIGMA_DB_USER`, `ENIGMA_DB_PASSWORD`, `ENIGMA_DB_NAME` se necessário. O editor atual recebe nomes de arquivos de mídia que já existam em `img/`. Upload de mídia não foi implementado nesta versão.

## Funcionalidades renovadas
- Portal com login/cadastro, sessão segura, prepared statements e CSRF.
- Senhas novas com `password_hash`; contas antigas convertem suas senhas para hash no login.
- Escolha de avatar e nome do protagonista; tela principal e seleção PT/EN.
- Jogo com personagens, imagens, vídeos, diálogos progressivos, decisões e áudio opcional.
- Cena atual armazenada **no navegador** por idioma para o botão continuar, sem banco de salvamento.
- Estúdio de cenas e escolhas restrito ao administrador designado.
- Layout responsivo, foco de teclado e suporte básico a redução de movimento.

## Atenção
- O arquivo SQL original foi ajustado para não distribuir e-mails e senhas dos antigos jogadores. **Faça backup antes de importar em um banco já usado**, porque o dump contém `DROP TABLE`.
- A recuperação de senha por e-mail não foi implementada: a página informa essa limitação.
- Este sistema é adequado para testes locais e demonstração acadêmica; para produção, inclua rate limiting de login, HTTPS, recuperação de conta, logs, revisão das permissões de mídia e testes ponta a ponta.
- Certas imagens, músicas e vídeos são arquivos legados do projeto. Verifique direitos autorais antes de publicar comercialmente.
