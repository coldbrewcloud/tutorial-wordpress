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
define('DB_NAME', '');

/** MySQL database username */
define('DB_USER', '');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '');

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
define('AUTH_KEY',         'I8%#Es,p$B_[}/[&.pi:##[{bf4dd}k[A.ZxT?UT`u|MG@diQ|uU}wo|+2@YfZ!x');
define('SECURE_AUTH_KEY',  '|U1%%U!^`62j!+-k]P_F~j NUs|#7=wnk|kvp-NvJ}(WI:omctL8:=c4II[@{R>y');
define('LOGGED_IN_KEY',    'Fo;x_SGPukGQ$>b-j}BpT9!M3tuN3{*<.UbHW*JSG1.&5OM#pW2/hEo5<@*d}Z<a');
define('NONCE_KEY',        'Vx?IG1{>cR&HNWy!x~-*g-|tL Cq&L/i}72W+SS,xJ}.(~rr,)r2+9]+Z4|,EaD*');
define('AUTH_SALT',        '$`qi$6jHu,UyJO5GN,&[wCdYfA+l7=:kU?:?nMF|WZR]+M~GR&PCf0,OLXbQ&AZ(');
define('SECURE_AUTH_SALT', '%LEI9A$Bq&Cmv-P?-^ -W:82n9MfJWZ}*~NN?G/;450(3](1xF||}kvS$,Hy+@:L');
define('LOGGED_IN_SALT',   'k#+x;_Ugt;< LB9]wz1<)BjCx^SQF0Zy/AU7U<n/{-CEeM-VAnp-)**OA]#C%9n#');
define('NONCE_SALT',       'q{({:V#GASi66~>OE-(T`|jNqT;2l?fGE6R]>R-MH2l*;T5z}qf_Y=@Kq81GOOB?');

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

// Disable WP automatic updater
define('AUTOMATIC_UPDATER_DISABLED', true);

// ELB - HTTPS
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
    $_SERVER['HTTPS'] = 'on';

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
