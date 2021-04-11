# Docker - React - Laravel

## O que está contido nesse projeto?

As seguintes tecnologias estão incluídas:

- [PHP 7.3](https://www.php.net/)
- [Laravel 8.1](https://laravel.com/docs/8.x)
- [Composer 2.0](https://getcomposer.org/)
- [Nginx latest](https://www.nginx.com/)
- [Mysql 5.7](https://www.mysql.com/)
- [Node 12](https://nodejs.org/en/)
- [React 17.0](https://pt-br.reactjs.org)

## Requerimentos

> Windows
- [Docker](https://docs.docker.com/engine/install/)

> Linux
- [Docker](https://docs.docker.com/engine/install/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Instalação

### 1. Clonar o projeto

* git clone https://github.com/WenLopes/docker-react-laravel.git

### 2. Configure as variáveis de ambiente
*Na **raiz do projeto**, crie o arquivo .env utilizando o arquivo .env.example como base. Modifique o valor das variáveis de acordo com a sua preferência.*

* cp .env_example .env

*(Opcional) Se desejar, altere as portas padrão da aplicação no arquivo .env*

### 3. Na raíz do projeto, execute o comando:
* docker-compose up --build

### 4. Instalando as dependências e configurando a API
*4.1 Instale as dependências do Laravel executando o comando na **raiz do projeto**:*
* docker-compose exec php7_base composer install

*4.2 Corriga as permissões dos diretórios, executando os comandos abaixo no diretório **api**:*

* sudo chgrp -R www-data storage bootstrap/cache
* sudo chmod -R ug+rwx storage bootstrap/cache

*4.3 Crie o arquivo .env do diretório **api**, utilizando o .env.example como base:*
* cp .env_example .env

*4.4 Gere a chave do projeto executando o comando na **raiz do projeto**:*
* docker-compose exec php7_base php artisan key:generate

## Utilização

### Comunicação entre containers
*Os containers podem se "encontrar" através de 2 formas de URL diferentes: **localhost:{container_port}** ou **ipv4_ipaddress:{container_port}**.*

***Localhost**: No arquivo .env, estão as portas definidas para os containers. Dessa forma, o acesso a os mesmos é definido através de localhost:{container_port}.*

- Exemplo: Se a porta definida para o container React for 3001, então para visualizar sua aplicação no browser, digite localhost:3001.

>**Obs:** Se a porta definida para o container nginx_base for a padrão (80), então o acesso a API pode ser feito diretamente através de **localhost**, sem a necessidade de informar porta

***IPV4**: Uma rede interna foi criada para facilitar a comunicação entre os containers. Seus Ip's podem ser verificados através da configuração Network > static-network > ipv4_address, onde cada container possui seu próprio IP.*

### CORS
*Uma middleware (App\Http\Middleware\Cors) foi criada na API e setada no escopo global, para permitir que o App execute requisições na API. A condição para que isso seja permitido, é que a variável de ambiente APP_DEBUG da API seja true.*
```
APP_DEBUG=true
```
*Referência: https://developer.mozilla.org/pt-BR/docs/Web/HTTP/CORS*

### Exemplo de requisição
*Um exemplo de requisição feita entre o App e a API está disponível no arquivo **App.js**, localizado no diretório **app***