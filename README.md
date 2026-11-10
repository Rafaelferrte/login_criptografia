# Login com PHP e Hash

Exercício acadêmico de autenticação simples utilizando PHP, formulário HTML e comparação de valores de hash.

O formulário recebe usuário e senha e envia os dados para um script PHP, que realiza a verificação e redireciona o acesso conforme o resultado.

## Tecnologias

- PHP
- HTML

## Arquivos principais

- `index.php`: formulário de login.
- `cryptography.php`: processamento dos dados enviados e comparação das credenciais.
- `page.php`: página exibida após a autenticação.

## Como executar

1. Tenha PHP instalado ou utilize um ambiente local como XAMPP.
2. Coloque os arquivos na pasta pública do servidor local.
3. Inicie o servidor PHP/Apache.
4. Acesse `index.php pelo navegador.

## Observação de segurança

Este repositório é apenas um exercício didático. A implementação utiliza credenciais definidas no código e MD5 para comparação de senha. MD5 não é adequado para armazenamento de senhas em aplicações reais.

Em sistemas de produção, utilize funções próprias para senhas, como `password_hash()` e `password_verify()`, além de armazenamento seguro de credenciais e validação adequada dos dados.
