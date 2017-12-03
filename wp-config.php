<?php
/** Enable W3 Total Cache */


if (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && $_SERVER["HTTP_X_FORWARDED_PROTO"] == "https") $_SERVER["HTTPS"] = "on";
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
define('DB_NAME', 'c9');

/** MySQL database username */
define('DB_USER', 'evoxly');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '&1}t2e|;[@;H|9TvZeKdn[LGVlukm_#49[xeL8*d:fQbgEP-z9`gMVRm;p*}Q.b:');
define('SECURE_AUTH_KEY',  'U*&9*c-_Aw.t;^(*`OIc%G;f2SB})xC|f6s_<X|:Jb/F)m-Vh?-gY+Sc^oP/e*|`');
define('LOGGED_IN_KEY',    '7K5xIl{l;ZL7ut4=lM*pEi%Ff*3.H%}dT<!b>ms<`mE}G0*j[cG(8)n%#/,!1xqR');
define('NONCE_KEY',        '|5BlHo<5+tqdk7*`mdeY%x}7nX+<.t[K8xOc@|1AnNe4v?#!T_/.G9l!>&!k&_!0');
define('AUTH_SALT',        'V04dhkj@bFjW.00{&jNM+C_<qowY}jQo~N>0:]3l{P-<@+7Q.g5RYZof8@k>P9pd');
define('SECURE_AUTH_SALT', 'pmB*!I k~wB..aa6cO 9V|UC_9nrG1 Bq0)/zL5XK8y8;ZH]m,lt~V+xMv2KSzIs');
define('LOGGED_IN_SALT',   'hE|q <(QRs_8dD!$+X;n{kra![!>%|tF*^_M5DYTx-g7O#t>3l(4R&@np8!xTidw');
define('NONCE_SALT',       'zM/jm3Y_xgq{>p{hf[=AKFGLH(pNLdp?NE4] m-p[vv+z6jcI+ST0EA]snF:=;Aq');

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
