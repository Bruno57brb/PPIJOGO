# ENIGMA CAPITAL: ECOS DO AMANHÃ

**Um novo jogo de investigação e visual novel, totalmente original.**

## O que inclui

- História inédita em Brasília no ano de 2041, com **4 capítulos** e **4 finais**.
- **Criação de personagem masculino/feminino**, nome, 5 tons de pele, 5 cores de olhos, 5 estilos e 6 cores de cabelo, 4 estilos e 6 cores de roupa e 4 acessórios.
- Visual 2D em SVG criado por código; roupas e cores aparecem no personagem.
- Cenas com cenários estilizados, personagens, escolhas narrativas e consequências.
- **3 enigmas interativos**, inventário de 10 pistas, diário de decisões e mapa de locais visitados.
- Atributos de confiança, raciocínio e coragem que podem desbloquear decisões.
- **10 conquistas**, contagem de cenas visitadas e histórico de finais descobertos.
- Salvamento automático via `localStorage`, exportação e importação de arquivos JSON.
- **Sistema opcional de usuários e sincronização com MySQL**, com cadastro, login, sessões seguras e hash de senhas.
- Layout responsivo e modo de movimento reduzido.

## Instalação no WampServer

1. Extraia a pasta `Enigma_Capital_Nova` dentro de `C:\\wamp64\\www\\`.
2. Inicie o Apache pelo WampServer.
3. Acesse `http://localhost/Enigma_Capital_Nova/`.
4. Clique em **Começar aventura**, crie seu personagem e jogue.

**O jogo funciona sem importar banco de dados.** É possível jogar até o final e salvar localmente sem MySQL. O código usa PHP para servir a página, mas a lógica do jogo roda no navegador.

### Ativar login e salvamento MySQL (opcional)

1. Abra o `phpMyAdmin`.
2. Importe `database/schema.sql` (cria o banco `enigma_capital_nova` e tabelas).
3. Copie `config.example.php` para `config.php`.
4. Preencha host, banco, usuário e senha com as credenciais locais.
5. Clique em **Conta e nuvem** no menu inicial para se cadastrar e sincronizar o jogo.

A conta não sincroniza automaticamente a cada cena. Use o botão **Salvar na nuvem** para enviar e **Recuperar da nuvem** para restaurar o progresso. O salvamento local é automático.

## Arquivos

```
Enigma_Capital_Nova/
├── index.php                  # Entrada e estrutura da interface
├── assets/
│   ├── css/style.css          # Visual responsivo, cenas e menus
│   └── js/
│       ├── story.js           # História original, escolhas e gabaritos
│       └── game.js            # Motor, avatar, enigmas, menus e saves
├── api/index.php              # Conta, login, sincronização de save
├── config.example.php         # Exemplo das credenciais MySQL
├── database/schema.sql        # Banco MySQL opcional
└── README.md
```

## Controles

- **Clique ou toque** nas decisões para avançar.
- **Espaço/Enter** com foco na página completa o efeito de digitação.
- **Esc** fecha janelas.
- Os desafios de frequência e código pedem uma alternativa; o do metrô pede ordenar símbolos.

## Limitações e próximos passos

- Cenários e personagens são ilustrações vetoriais geradas com SVG e CSS, sem sprites profissionais.
- O sistema não possui dublagem nem arquivos musicais: propositalmente não usa áudios externos de terceiros.
- Não há modo multiplayer nem publicação em loja de aplicativos.
- As senhas são armazenadas como hash; para produção real ainda são necessários HTTPS, limitação de tentativas de login, recuperação de senha e revisão de segurança independente.
- O projeto contém uma narrativa jogável, não um motor AAA nem jogo 3D.

**Créditos:** Nova história, código e direção visual criados para a releitura do projeto escolar Enigma Capital. Esta edição não reutiliza a narrativa anterior.
