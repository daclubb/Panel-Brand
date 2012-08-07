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
define('DB_NAME', 'panel_brand');

/** MySQL database username */
define('DB_USER', 'panel_brand');

/** MySQL database password */
define('DB_PASSWORD', 'tmhctr!@#$');

/** MySQL hostname */
define('DB_HOST', 'localhost:8889');

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
define('AUTH_KEY',         '|IXC8P)gqR`t6WRb`;$O;~$0yHos8IvT8e=%z`;!`e0=T^,;&a2h&%O<x`$qv6s@');
define('SECURE_AUTH_KEY',  'Dv(a!jr+qxV(Tkh.Fm[K-j=q iH4vU,4}5QGLj<U?:A6mlweEfA {)_KAJl+=/FU');
define('LOGGED_IN_KEY',    'Bo0yG^Qoz1hGq!19%YNj*n5fBGJbqku#scU-GKJtIh9&/|tC#g+5&AJ*N2*1W~--');
define('NONCE_KEY',        'SYtj-UAG#c>}NkQ[8|FgJO^t={>KtkEI9AlZk+>P6J @]8R~S=IXwd/zrM]aEQ>8');
define('AUTH_SALT',        'G2VvaW/T-i|/^m|1qB2T2,.}A kkaJB471{sw]bM%+dHa)+HrCI2nE~? .3bns>&');
define('SECURE_AUTH_SALT', 'AVvC]=_KI5Y0FFWipX2k^++cdx=22:GS+n~jzb]|bhfncxipa-J.#J1e7x&<<i9N');
define('LOGGED_IN_SALT',   'bTq|z| 0Af-r mpKOqX%VUr>~ @.:NN7hYNQT_E0@Ib|1-WFCYV^Ev,P|Gj8`oN,');
define('NONCE_SALT',       '_z6TlbI#R]=SRs46xG;MtH,=pmr-1kWwyzQ$KiU`ea|6?v@_9I>}B9-O3<h~&r!M');

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
