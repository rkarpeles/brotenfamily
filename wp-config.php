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
define('DB_NAME', 'brotenfamily');

/** MySQL database username */
define('DB_USER', 'root');

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
define('AUTH_KEY',         'eB2qZSMWKt>`sfs!Q<@m*)UCfmfg2{~d!^~H0iR9Jv>tQjHO&4Xjjp;GxEs]dikI');
define('SECURE_AUTH_KEY',  'M9/wY?!3SZH$qqa;M9N?6%rw<T/R~>,H7n9h_Qn#]H4ydd36+y ;o~T!RqFY(DUP');
define('LOGGED_IN_KEY',    'k8q elx3!+6`(b<U=B]y$+]m6,Dw3QX]H<y-kHP_X1QXJ8R|!x+H*-oxyJn:rc@X');
define('NONCE_KEY',        '`KD|cUt/-=p%jR(qY-%dV52<#Qb?O7._%nIV=7M[JUEpz_H:_T&QKn].rV~:l0-4');
define('AUTH_SALT',        '1cF:k:1!Sg]</*ps)vUQ@$7?4_ 2tc_XlYk&].xJ(Eca[FnS:+pl5m^[x?&SK9k?');
define('SECURE_AUTH_SALT', '@!L* jFd9?btPt{m7R^iC(omJKnre*(lCEO%w16E7r,xwqQ&`,-8Zxcnx<WECRWJ');
define('LOGGED_IN_SALT',   'q$>J#*z7<Wh(Rd=T6|2ml6xvPtvpGAAgd&qi>i,/zvrRI-@B1+c+<mofwqXBw|jy');
define('NONCE_SALT',       'fc@R>4>Xp6%jbOd9/6zNow[ 9>6xrL>Ae&NdQo{#%W#N=Ok?^2Je4ue6^zQkDqFw');

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
