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
define('DB_NAME', 'adminstreamingd');

/** MySQL database username */
define('DB_USER', 'adminstreamingd');

/** MySQL database password */
define('DB_PASSWORD', 'protectHouse1!');

/** MySQL hostname */
define('DB_HOST', '68.178.217.8');

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
define('AUTH_KEY',         '@~>fk+0`p<%U::Vl*CqJ 3AJUnakFnPF#eep @z)si.8Yu1C2S@BNN1%=J*uy~Sg');
define('SECURE_AUTH_KEY',  '@~D&J5Y7R(RTS6GKJV4)5*$@&/[jI%1O-#LgVd,`leGZ`zZTr3vzvI677PuY@@;d');
define('LOGGED_IN_KEY',    'KSM7VK!--#h{QcL[W_P.4}-Ss[tE4g`4_WwWM<euDxRgU^U_Z7Ek1l<UAw{wE6[E');
define('NONCE_KEY',        '2ZtkbB]C[ rJo-[~a.QF`Jk(cuQvJq>juy3C{$Pi=MijfYCYSp,h6;ro 2HH#10Z');
define('AUTH_SALT',        '>3*#b?X[S0E.U!=xEX>t@)w ]o|gO0DzoNRtbvDYl7VGYsgCI*qtU}?fYs4]yICz');
define('SECURE_AUTH_SALT', '31J<ma2Lj-IIeml]?l5b@B,-p+K!yJ*{JxaSr;|ui ^cbadXw*Dc:i9>Z*(5,LR&');
define('LOGGED_IN_SALT',   'Akj_n0N1]QG>H{!A3a(,`IZ]t:rtw%9{$5_)LUw*|=/;Sz/1XLg w(n~GQ!x|_8(');
define('NONCE_SALT',       'ha[)`}&bMrTf0dspY/lwE9r%1>=vT^J$AjJ k~GCbfKYK-MNg>H$;+]fv49CWz{;');

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
