<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'cu52957_wp');

/** Имя пользователя MySQL */
define('DB_USER', 'cu52957_wp');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '6KqJNkqS');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'tFX@P*OB#Vjq*SUN4{o/Q;ys.6i<}LITACR>`/94GqZ]U;&vme!CJa)Fk@@lZFCI');
define('SECURE_AUTH_KEY',  '4zaNm?|w=r^cm9l94J?sT{Z8p4P:~.T.~YNA94kd-N)@&20ND%,4:4iWp90f22q]');
define('LOGGED_IN_KEY',    'XbRSxhi]K<RipE+*1FH9<$cV}}{W4&3%{}6E!Q#GeqRroGoP,:}vbKOc9Z$Y3o9z');
define('NONCE_KEY',        '4uy[Zl(Hk<Zqo/q0GkG?k.q=h8O6o;` ^&G0AgO8<mTf1*K~`n$,3|QT+](HdI|^');
define('AUTH_SALT',        'l,8WG8dn@67@tU);iehXu_[xl`}Q;z^MX|5xf&0-Rk^$eFYPcJ0WLQxeGUiRd?&;');
define('SECURE_AUTH_SALT', '6`t6Lp6e*}_Z}oGw|Oo.f7uZtG#VvQ[k_Arru{ o@;t) %3q?Yr>(>Yt<H#SgId&');
define('LOGGED_IN_SALT',   '4Gv~T+NRi/BX5q=X%Z?}?jVBOz*mPjNLwPfk:6=[sTcTU-^fjz>GJ,Kh4Wd=<g:>');
define('NONCE_SALT',       '}N(0/Q|RJP3{I[6f$pj1-a&b2T^L{Oy%5*g29 x4.W@Kq:(TI2$)9N<-PSBnH_k(');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
