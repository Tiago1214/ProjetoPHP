# Projeto_PLSI
<P>Repositório github: https://github.com/Tiago1214/ProjetoPHP</P>
<p>O projeto vai sem vendor, por isso é necessário fazer composer update</p>
<p>Para configurar o nosso projeto é preciso correr os scripts
da base de dados que são o gersoft.sql e o gersoft_test.sql
(base de dados de testes) e de seguida correr o comando php init.</p>
<p>A base de dados tem a seguinte configuração no config/main-local.php </p>
<p>'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=gersoft',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',</p>
<p>Para o projeto funcionar corretamente é necessário criar 
dois virtualhost o back.test e o front.test:
* Diretório back.test - "c:/wamp64/www/gersoft/backend/web"
* Diretório back.test - "c:/wamp64/www/gersoft/frontend/web"</p>

<p>Um utilizador cliente é o utilizador
com username='bernardo' e com password='12345678'</p>

<p>um utilizador admin é o utilizador com username='tiago'
e com password='12345678'</p>

<p>um utilizador funcionário com username='miguel' e password='12345678'</p>
