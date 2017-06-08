<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tactive_tactivemedia_db');

/** MySQL database username */
define('DB_USER', 'tactive_tactive');

/** MySQL database password */
define('DB_PASSWORD', 'RagedDogieJigsCue46');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ji,S|/6]}WKfaNqN+bn2n|{;-JeLvb cQ*!xuQ(o}g8+x24LLj1Z{K:K<s?fUT,!');
define('SECURE_AUTH_KEY',  'k.D`XXi:ym2geyx+!N3`R{s?{>b.ylN0_qa_9j@6MhuY[0LSq3 /jJW*j@HsDaDK');
define('LOGGED_IN_KEY',    'FxCafC2)L=m0z6UQsbu6{6X.h7cv<7[Cg{8c~6A/.hd fG=p]E)sd8aR9&{cJc(&');
define('NONCE_KEY',        'E~ps|%&Uo;XLqyr4<!;7*,zOC)>xI?t>Qci71Ow##b|{km>6$g/HMjg9w ^=&aE<');
define('AUTH_SALT',        'SB]&s-{ r`PHuS#C1/FI:#xuspHSWG!s1AxtaqQQ>I8RD4,51Iu0!Lq|+e @>1#&');
define('SECURE_AUTH_SALT', 'jFf`yEim V-dLF=&<@$(za,$Mw}A?y$szy5XTA%`ai}qg_nv;4g/L(9DZBd:M]}1');
define('LOGGED_IN_SALT',   'Y`:c[anR^;X>,Y[4g]<WkL@dnaOB2.lwB)$%B{,?.9fAHCmoz=y04?/%%lT}T7^}');
define('NONCE_SALT',       'Z6c5RzSTM>u:9/Q)&/]}(~+c.c$;V,}Onb~h3pZ=G:TJQuG%Ecjp2r/:B~`x?$:~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
