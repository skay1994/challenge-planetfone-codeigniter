# Desafio Planetfone

Objetivo:

Consumir 5 usuários da API https://jsonplaceholder.typicode.com/ e listar todos em ordem alfabética.

Requisitos:
- PHP
- HTML
- JAVASCRIPT
- CSS

Diferenciais e análise: 
- Estrutura do projeto, código organizado, comentado e limpo.
- Uso de alguma biblioteca frontend (React, Vue.js e etc).
- Uso de alguma biblioteca backend (Codeigniter, Zend e etc).

Regras:
- É obrigatório que seu backend seja em PHP ou em NodeJS
- O seu frontend não deve consumir a API diretamente. Você deve obter os dados pelo seu backend, tratá-los e fornecê-los para seu front consumir.
- Exibir apenas os seguintes campos na tela:
  - id
  - name
  - username
  - email
- Documentar a instalação do projeto em um readme.md e publicá-lo em sua conta do Github.
- Não há prazo definido para entregar o desafio, mas as correções serão feitas por ordem de recebimento.

# Detalhes para uso do sistema

### Docker

Imagem docker diponivel, use o comando abaixo:
```sh 
docker compose up server -d
```

Ou com [DDEV](https://ddev.readthedocs.io/en/stable/users/install/ddev-installation/)

```sh
ddev start
```

# Documentação

### Backend

Listar Todos os usuarios:
- **Metodo:** GET
- **URI:** /api/users
  - query params
    - limit int (default = 5)
- Corpo
  - Array com  Arrays:
    - id
    - name
    - email
    - username

Recuperar usuario unico
- **Metodo:** GET
- **URI:** /api/users/{:id}
  - url params
    - ID int
- Corpo
  - Array:
    - id
    - name
    - email
    - username