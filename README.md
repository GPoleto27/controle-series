# Controle de Séries
Aplicação web para o estudo do framework PHP Laravel baseado nos cursos da Alura.

<h1>Clonando o Repositório</h1>
<ul>
  <li>Clone o repositório: <code>git clone github.com/GPoleto27/controle-series.git</code></li>
  <li>Acesse a pasta: <code>cd controle-series</code></li>
</ul>

<h1>Configurando o Ambiente</h1>
<ul>
  <li>Instale o <a href="https://www.php.net/downloads">PHP</a></li>
  <li>Instale o <a href="https://getcomposer.org/download/">Composer</a></li>
  <li>Instale o Laravel usando o Composer: <code>composer global require laravel/installer</code></li>
  <li>Instale as dependências: <code>composer install</code></li>
  <li>Crie o arquivo do banco de dados: <code>touch ./database/database.sqlite</code></li>
  <li>Edite o aquivo <code>php.ini</code> (no Linux, normalmente se encontra em <code>/etc/php/php.ini</code>)</li>
  <li>Descomente a linha contendo <code>extension=pdo_sqlite</code> e salve o aquivo</li>
  <li>Rode as migrações do banco de dados: <code>php artisan migrate</code></li>
  <li>Suba o servidor: <code>php artisan serve</code></li>
  <li>OBS: a página inicial da aplicação poderá ser acessada em <code>localhost:8000/series</code></li>
  <li>Abra sua IDE favorita na pasta do projeto e começe a programar :)</li>
</ul>
