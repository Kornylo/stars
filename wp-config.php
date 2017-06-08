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
define('DB_NAME', 'trip');

/** MySQL database username */
define('DB_USER', 'kornylo');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'd!0uIK7Udg,<)|jz&y:/v<(?x;^?Sb+(j=2E@w.JcIEfR[iDGUy|Ti!@pEb@(dL8');
define('SECURE_AUTH_KEY',  'QaZ_yxtp^#eB}@E@@QG!i*CKAE/I@`r8:u4N!*Pu|u(x+cr<eIeI8O X2n5~K}UM');
define('LOGGED_IN_KEY',    'q7.3?<n[- @n?+ +ONP@Mhrmh2s61mj|M7=LY*oK~*@IqV#.uu;~h)1!lXuI>adz');
define('NONCE_KEY',        'x9e^MF{0]40Mspb/J7zRo!Fqga+SZzI;6=!>5I@[PdnZUF4 gsHN=B<I&K;sI-eY');
define('AUTH_SALT',        '#1RP8LN%*<C}mRu,t{&xD(?>L,L!1.ytA8hg)!;6]:Td!>o^3w_Yib+MA$~yv^q:');
define('SECURE_AUTH_SALT', '+vw%#zZY)t(dMaOp>?r_C&:)h5C >1HI{*YDV-j|A>hBl0Uwz6r$v7jVqw/+>6+t');
define('LOGGED_IN_SALT',   '%eT$&C4l}9QudOB`HB[h<s{QFLJvHsH(|h:bFT@^0fgi-6T|5+*Z(]eD:(vg~GX>');
define('NONCE_SALT',       'Up3Rm#uo%=WEFwB<;,GC^y/+pT43p,[p}Zoi0JExX:EZ9^!|8LBSZVB[uU$)o/hB');

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
