<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'wordpress_test');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'root');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'xRfoR$>4gC6E4ZaYx~ui.|U@oc]S]Me[4IB`xzEviq1ki.Mo]FXCJPk@P9/%5no.');
define('SECURE_AUTH_KEY',  'r0(3Z<Z~%-8,K-5(.W}-dBdvD.qSiv-7rzV$$3>W?X[&W/}Cwk+^o)RUj0dWFo:!');
define('LOGGED_IN_KEY',    'Gi<: nFa,!y$lI1}$,P$4s<Xmy]X r^g7%3X/~ECBLfxQ-(2G  T3`G|$;U/ej1|');
define('NONCE_KEY',        'o-r8T,OB/oD[*LEP]TO4Tu:PQCc`r1$]z%LsrTwLzsX#q-pbUN:dkT[2na:=JJy4');
define('AUTH_SALT',        '4;UTtt7`t?:U``pBhXO6>XfWbzHYvOH95v;Oh5R5`y+06ghc=sLl@dn xzrq;JZk');
define('SECURE_AUTH_SALT', '*?d-=#G-h#KG6SYqRTF1o+?{IoEB00@;WfOhz;|{e/s!e:+>m({M+nO%9v:50M*:');
define('LOGGED_IN_SALT',   'VUxe_A&5=gUma1zh[&PlK%C&baWECRsW}$xB_o|*kDm#clUqYio]2<w{F6bP~_ &');
define('NONCE_SALT',       '24ABL=E?E`gvlg?;]Zorvgju^!(]5Mrv*TE}yr2%j-Ewm#zx0hX8ZM5T4q34aH-m');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
