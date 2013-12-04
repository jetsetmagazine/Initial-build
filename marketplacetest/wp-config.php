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
define('DB_NAME', 'dotco_class');

/** MySQL database username */
define('DB_USER', 'dotco_class');

/** MySQL database password */
define('DB_PASSWORD', 'DSVv545a');

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
define('AUTH_KEY',         'Hi+-,<-3{V!rl)Z7O3y81 ji5z*Z(~K(4b[?MYGf3$MkkC61C_}9oWLtIOMsS4^H');
define('SECURE_AUTH_KEY',  'Tp%/VrSp9XT=x}KM.DzK#%jg!.p8oh2oHFvOV1~fzbr0&r;*vsu0getE5yf%{7 :');
define('LOGGED_IN_KEY',    '_;|GNXUh5pV$|?CWyE,u(-5d5xCny+16LS>aug+HXMLTPlfpECABhtct1y|Lb/|7');
define('NONCE_KEY',        '+9Ff@5LMzX.a*#4pJ!GU3Ihpc`dTU;H:v|sZ|(_c0*|@0bo-@I<|x|%[fepcTNFz');
define('AUTH_SALT',        '!ASN2}ukTOj] p|O&,+sS^>ELx7wr+_QQ<@NqZb*Mb-@r867l2Tz8)vV{7JPK0{q');
define('SECURE_AUTH_SALT', '^y*pA[5;I:-HQ*5_CZ}T7,(gzRW4crq3m+M6XK~O~]VZ6^{cy8,BRLyLL03_LvbX');
define('LOGGED_IN_SALT',   '+q$|%#:-+Oq(3hecm/|CIX+iXg-|?--T(vcwB)DxQ+XbZI_JO@`+@-_Kl@w1|qE`');
define('NONCE_SALT',       'L0Oi+el:5;gnH@t~~>5]oLVVaQ-8GeAn-/:esVf)5+~Y`iO;+v+9=1[#AX@y0=wK');

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
