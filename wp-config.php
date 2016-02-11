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
define('DB_NAME', 'sjenterprise');

/** MySQL database username */
define('DB_USER', 'sjenterprise');

/** MySQL database password */
define('DB_PASSWORD', 'aBcd123xyz!');

/** MySQL hostname */
define('DB_HOST', '182.50.133.90:3306');

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
define('AUTH_KEY',         '{$bqk5:znhpT,<}Geo|9kOIPRMDX5H;A+V>~45YI-Ss|bs|<cU}H~NEsOV)B}Qrf');
define('SECURE_AUTH_KEY',  'Nzg+X!+UaaNrK9UB|R;y<bPBs*$!b}r:V+L?d~|8hyS&bB UKFfZisOw!TVs-,d/');
define('LOGGED_IN_KEY',    '.Ja9-52 yi|i2NO];_TetZ}(;949K(m[VM>DwM^Y$6L^;?B|CN~~yDUM|3kpoJ?7');
define('NONCE_KEY',        'x{%]<~6SL+-olHLA^}G`ds8:dz.Bf)aZcq6r)-NEU>tOwKWb]V@GgcSf~o#[.i7>');
define('AUTH_SALT',        ',e_ENN(zBd=x)lF28Zoma0Jp?qpQ5.<+gSW-X?-^^?| 49T|;pVn-%{G[bsZ^xOA');
define('SECURE_AUTH_SALT', 'LA,-p& 8.XOn{6(5q-sW1Ju|8jb86?xv>|NZIA#X$$*WC9Ksd<yv=IIA}^#6@@;#');
define('LOGGED_IN_SALT',   'TTbO#n~,d+nMtk++B(d _(x]i7,wK(.*(2{6!WaGD)z>Ui^ckuTs2pgs vj}AN:Y');
define('NONCE_SALT',       'U7oU6#-vvzCQ5>)LJ%T-N+|/Kfs;!!{(!l+zxBj&-Zr[wp/{8+Rc 7{n/&L}o_;S');

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
