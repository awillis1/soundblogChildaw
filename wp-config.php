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
define('DB_NAME', 'soundblogchild');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'W/{_7D`1q45e/:Zll3=oBW}3%UXgU`)i=#&nVa~SfC,x)gB%J&;Q>0hk@G(-IBca');
define('SECURE_AUTH_KEY',  'O{SJ8DXZjTl-j}r]k()?kGno2F(px9)~s~jZDwFu=TLd=|G&A7J~72:~heWT IgV');
define('LOGGED_IN_KEY',    '|dCoG.uj>L5/fci-(`qxXpH6rk4SwL`*1#?rymx^(cOv-[?Si4xKmt4{T|K4omw,');
define('NONCE_KEY',        'Z2Kirn96DelE:9a&fOj53d.&b@f9{HRjn`V7v-n]#CTr^#Z)N|X%:/o.P+Y2gw;6');
define('AUTH_SALT',        'w?TBAWCkPD02_,RtWD0wkt?R[U5UX[wR,4hQ;h D8^$D!0B xTiL0j^z7s@O$<mV');
define('SECURE_AUTH_SALT', '8URv9mMr~2<w=y3<k(}R(&u$UdFHvroBC~? TYM(}DN7:Gazj=woLWRt-CZoF9ai');
define('LOGGED_IN_SALT',   'F/1)iu<LC]:|>}Kg{y){iwH,?&b7t+kPzk?kg*8NGR02R.T%;TLN8v*%,0Oc}WN<');
define('NONCE_SALT',       '<dXc;2yUcl/p3Z}4.X({`[x:b_#q~?]NhF>^|Gb6-K<&#SVZc>D{E>/N%YOrus`E');

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
define('WP_DEBUG', true);

// Enable Debug logging to the /wp-content/debug.log file
define('WP_DEBUG_LOG', true);

// Enable display of errors and warnings
define('WP_DEBUG_DISPLAY', true);
@ini_set('display_errors',0);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
