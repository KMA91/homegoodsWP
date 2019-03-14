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

// These settings should updated manually by the developer <<<<<<<<<<<

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'database_name_here' );

/** MySQL database username */
define( 'DB_USER', 'username_here' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password_here' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
 define('AUTH_KEY',         '-VbnUTTPj6M43my|}2#5R>t;8 vt|7@o)lCv+t#U|5p &MY7LRTW5*4}6QxxG>TV');
 define('SECURE_AUTH_KEY',  '?bNji)XbiEYB>BX4zN:{QDroQdBMwb}Nih|W`l|N-N;.|M1X6cXgEGDhew 4T20)');
 define('LOGGED_IN_KEY',    'Qjg(}/pf?dC13]##y8GNr}-DdIOO[2b_y^@r+:zrw=P)F.&1JM2Z[FB|jECcCSw6');
 define('NONCE_KEY',        '~Yc 3]|/-%TTiAqvCMx7tseQkkcm5uB&+JVecz]:JO+q[Z-.]@5rD%-MAUXNqo?/');
 define('AUTH_SALT',        '6=G .^$e0hm++oHK+fi>XwWJ*W>E^a7NKi.JbB+/{o=f?`3qsyk6K?<mYv;&Q[Pk');
 define('SECURE_AUTH_SALT', 'H G.j>P~qsjETs>Y-1cSy2(h&!D6H-U;/aaWZ[uNP6?JUjVmZ[:gP|yTrE]R_NZ$');
 define('LOGGED_IN_SALT',   'Yy2|;YL+7`[R#wg/%kH7X`{ZlZSG&Cqo*%$CQ-o,5y&gRhV&Y6}nxT8{g/eGSflp');
 define('NONCE_SALT',       'F&*p6h{UC^,&5*)wX&@m(oMQiV;/yA~#hi9i?]C})z/9V[lF|;kkz7RU>9.$P?uT');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
