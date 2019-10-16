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
define( 'DB_NAME', 'jlaarc5_new' );

/** MySQL database username */
define( 'DB_USER', 'jlaarc5_new' );

/** MySQL database password */
define( 'DB_PASSWORD', '~$xn{EHHiJu(2O]^Pi' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'ixl3h4b534tnbaumvdgtpiajizma4g7ta6qagaj7ir9dmohy4klfdt37lqre3iaa' );
define( 'SECURE_AUTH_KEY',  'qqcetp1guwvjmmqd3z05cxihzs1u4mlx6nczjefmtifggtzgsdwe2surx8chxigz' );
define( 'LOGGED_IN_KEY',    'odhrdtze6wus7detvlllcdfepkh8q0sqefxfswnlxqbxmvermermetx5ylp6uzr4' );
define( 'NONCE_KEY',        '8fonz3ggxxyy8zvuxcugd922cwm4acpw6lwxurgireq3cq0ouvplmbwonc8orekc' );
define( 'AUTH_SALT',        '4fq7qylpfqlvst9dgmzsdf33hbihmmfuiyitnnfyslkqu2qm8kmec6cxfmelo3ge' );
define( 'SECURE_AUTH_SALT', 'nk75rez7mcrtxidstlfw5j3taygoldkgbmzwrnxcb2ytckoivjpuc26w3sukckxp' );
define( 'LOGGED_IN_SALT',   '5a0rdcmf3ht0auaukuzthm89prgzp0gxlrxue5dvshi0jxnoqnettam73kngq6cs' );
define( 'NONCE_SALT',       'mmp9bjc3eoe29otrblwyk2vbmyeekygukteip9y44siphnuzlhfvieausgsexb7c' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpfp_';

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
