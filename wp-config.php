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
define('DB_NAME', 'govpac');

/** MySQL database username */
define('DB_USER', 'govpac');

/** MySQL database password */
define('DB_PASSWORD', 'jesus777');

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
define('AUTH_KEY',         'jFY5|j#Gfhp]Gj-p5I4P-zxG@tF;?K3B,T`#l^%T>_wlI]np!Abg)Aofo/6#i3a!');
define('SECURE_AUTH_KEY',  'r-_UjbL/G^v+^6]t;1kAUM?hbgW;26*,j9b!q[v;uOoW5.Kf].59.ak)BZjyRoz4');
define('LOGGED_IN_KEY',    'DYb@Mz$!B@3*yu`uXE&bML`1p>U#H#n*f69//Lne9F+kUeH;@]8&w7Uc!shpzEkZ');
define('NONCE_KEY',        'w27y^c*RX?hoX/<^_}F-)v]e0m0%Gju89fnf<)Xg?otf2hpQuZc*eZ^&SI};.F 9');
define('AUTH_SALT',        't,,|>hZ-`!m>F.xjX3Xpf`o ?,l{,C@:J`ThD`Kws)cta`_A#tgpMoF ]nTN?~+`');
define('SECURE_AUTH_SALT', 'v[@B|i~Z^-!}DODXZ]!fp(%W`C1b$R^7a8a3nD|7!#.TFB2neTLZi!=aCf^Ol`hM');
define('LOGGED_IN_SALT',   'dq(Ceg6b0.Sp.BF3O(jfe,5 JPK Cr/f%mV~)ws 5aAM&$x%k@iZr{-%eHSGy)16');
define('NONCE_SALT',       '@39*-;xRv)c/Jtzsvq?hKSJvpLO#./#vmg[-vZ!|rlL~{+6A~+qMS<1N@=pAkrt?');

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
