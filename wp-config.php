<?php
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
define('DB_NAME', 'phc_local');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'grandgulch');

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
define('AUTH_KEY',         'P+~hrh%b(@:<#;VRe|KEy4 !+bB7n>:+IEa>b+5_1:NTJoe}d1%YJ.g4z 5y(1jt');
define('SECURE_AUTH_KEY',  'o*!PF&rr=8(%JggV0N$g1Q-&X!X*}hKM3aN;G;Gm1(E}R`khAWI*2]G!^A{GOgNX');
define('LOGGED_IN_KEY',    'wa!zG-GA/sh=9D7yb>DZB^D7a=wn=O-?m`bA<N<tXUiXGE|Vtu _TrY+CTFz7^@C');
define('NONCE_KEY',        '>t*yI(|xF_}C~.![*FN0Dz2y>b|Hn-n^dA-(D2J|+!CWF_+vVw>_Z?_AQ!H[9aU@');
define('AUTH_SALT',        'tik~^NRcV:&.e4dnM:1FG=id`hSrZrH*A4b9,xFaxfpM[3ClyWL#>HE{;]+9nF,4');
define('SECURE_AUTH_SALT', ',<5fMg~6_==4>-h|M?aan1SbrZ5[H+F?3.8~)~7af@mWc+-H-3shm~>^h2:]`yt|');
define('LOGGED_IN_SALT',   '-+OLeTdr4cZbink[2`|_ 8zohx8hBT~8tkb:@MS-:r5].W!m8h?+eJC)9+8>Q)kE');
define('NONCE_SALT',       '23!UK@aY:+ghvLX3Nx^m+P;l&<iiTT}|Af_n{O9#M<v(bnDk$oA9J#|7;D(|Ge<W');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
