
# Helper do projeto

## Passo 1: Verificando versões
<h4>Composer: 2.7.1 2024-02-09</h4>

<h5>Para verificar a versão do composer basta utilizar o seguinte comando:</h5>

```bash
composer --version
```
<br>
<h4>Laravel Version: 10.46.0<br>Laravel Realese: 2024-02-27</h4>
<h5>Para verificar a versão do laravel existem duas maneiras:</h5>

<h6>Primeira maneira, a mais básica (não exibe a realease):</h6>

```bash
php artisan --version
```

<h6>Segunda maneira, a mais completa:</h6>

```bash
composer show laravel/framework
```
<br>
<h4>PHP Version: 8.2.12 (Recomendado pelo Xampp)</h4>
<h5>Para verificar a versão do PHP utilize o seguinte comando:</h5>

```bash
php -version
```

<br><br>
## Passo 2: Clonando configurando repositório com Git

**Caso seja a primeira vez que está acessando o repositório, clone-o com o comando abaixo**
```bash
git clone https://github.com/zDayCoder/Rota-de-Estagios
```
**Acesse a pasta principal do projeto e inicialize seu Git com o seguinte comando:**
```bash
git init
```

**Que tal configurarmos seu usuário e e-mail?<br>Para isso utilize o seguinte comando:**
<h5>Usuário:</h5>

```bash
git config --global user.name "SEU NICKNAME"
```
<h5>E-mail:</h5>

```bash
git config --global user.email "SEU E-MAIL"
```
<h6>Provavelmente você irá precisar se conectar com o GitHub</h6>
<br><br>

## Passo 3: Instalando a Vendor:
**Execute o comando `composer install` para instalar todas as dependências do Composer, incluindo a pasta `vendor` e a pasta `node_modules`**
*Verifique o arquivo php.ini em `C:\xampp\php`, veja se a extensão `extension=zip` está sem `;` em sua frente antes de usar o comando abaixo.*
```bash
composer install
```
<!-- <br>

**Após a instalação, certifique-se de que o Composer gerou o autoload corretamente. O autoload é responsável por carregar automaticamente as classes do projeto. Execute:**
```
composer dump-autoload
``` -->

<br><br>
## Comandos Git que mais serão utilizados
### ATENÇÃO: Comandos não estão na ordem de execução!!!

<h5>Comando para trocar de branch (main neste caso)</h5>

```bash
git checkout -b main
```

<h5>Comando para visualizar a branch atual (utilize -v para saber a versão do commit)</h5>

```bash
git branch
```

<h5>Comando para criar um repositório remoto (altere o link caso use em outro projeto que não seja esse)</h5>

```bash
git remote add origin https://github.com/zDayCoder/Rota-de-Estagios.git
```

<h5>Comando para realizar a adição dos arquivos (caso queira enviar um especifico, passe o caminho ao no lugar do  " . ")</h5>

```bash
git add .
```

<h5>Comando para realizar um comentário</h5>
<h6>Utilize esse padrão para o comentário: "Comentário sobre o que ocorreu + data que ocorreu (dia/mes)"</h6>

```bash
git commit -m "SEU COMENTÁRIO"
```

<h5>Comando para realizar um envio ao repositório (usando branch main)</h5>

```bash
git push origin main
```

<h5>Comando para realizar uma espécie de atualização dos arquivos do repositório para seu repositório local (usando branch main)</h5>

```bash
git pull origin main
```

<h5>Comando para verificar alterações realizadas</h5>

```bash
git  status
```
