<?php
/** Enable W3 Total Cache Edge Mode */
define('WP_CACHE', true); //Added by WP-Cache Manager
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache


/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

 //Added by WP-Cache Manager

define( 'WPCACHEHOME', '/mnt/webk/a3/24/52037224/htdocs/site/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager

define('DB_NAME', 'DB2002794');


/** MySQL database username */

define('DB_USER', 'U2002794');

/** MySQL database password */

define('DB_PASSWORD', 'dwp1mysql');

/** MySQL hostname */

define('DB_HOST', 'rdbms.strato.de');
/** Database Charset to use in creating database tables. */

define('DB_CHARSET', 'utf8');


/** The Database Collate type. Don't change this if in doubt. */

define('DB_COLLATE', '');


define( 'WP_POST_REVISIONS', 5 );


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         '{BFrF&RWxz:FQ0Ey3KFU:K|*[B1h02C$Q>w C^0b>>h2]o%W@pnc%jrWX^ViqFMl');
define('SECURE_AUTH_KEY',  '{X[X#8R{Nnjg8Rgj]F}%kfMg;K#e|lmMUs#)fC,N;`<gK)8Bm+L-3~bk!.C}Mgj,');
define('LOGGED_IN_KEY',    'yA#QOeukiCsAC9gJFli%waQ01c{w.B^Z5:D{Qg3~f{ @<>`+VZCcNa#H:>MZB^Bp');
define('NONCE_KEY',        '>PPyV7x|,.S;|P (iR+gm9*m~)|V-AeSX,_GWjPY+uh)Fac`$tYjc*ryB%hv9@dk');
define('AUTH_SALT',        'B4!7MICS]+>jk-!>Gm/MhS[2DS`8n~Nq(>K7eUm5-8zCkU<>Fzdg;e7)FP6U#a0n');
define('SECURE_AUTH_SALT', 'bd0LCEdX#nU0rDUz.qfLst>J1~ymAob|<PP_Znmi!#WzG_Qz&A*P ?R/Q%~3FdMF');
define('LOGGED_IN_SALT',   '.M}ofbjiwK+P7l+e+v0JE8g*a `}qjhBC^RQxz+hdS IuS43HS`MLO-PnM7m>CD4');
define('NONCE_SALT',       'GLe_v?9u4k,v>7Be]AQA|_7{1-uVxM79:<[~|fsMsBm,lqht~xAqg@)aT_Vnm(c6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dwp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
