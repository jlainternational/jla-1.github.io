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
//define('WP_HOME','https://biz251.inmotionhosting.com/~jlaarc5');
//define('WP_SITEURL','https://biz251.inmotionhosting.com/~jlaarc5');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'jlaarc5_wo484');

/** MySQL database username */
define('DB_USER', 'jlaarc5_wo484');

/** MySQL database password */
define('DB_PASSWORD', 'bBGUzCMLsGQ24T",*J');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

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
define('AUTH_KEY',         'Nc:!E1Se::g;*P<6txUy IY ~TH5M|dmSyK0 *T,J_i5BSr&ruk`I0L{< ^xA}Dy');
define('SECURE_AUTH_KEY',  '!j6nz{u=?0#r]y.-XjL8;v|!I>6(^sLI|?2yra9:#5|%)cPv=vDY}q{zgQ+e6^J+');
define('LOGGED_IN_KEY',    ' P^MnLA~f4CzL3m5xXF-TB-Vire[F%@_GBK*O5nC,W-U$Ibj,S0H^@0/~-bu&vsc');
define('NONCE_KEY',        'i6X8t!kpy:TK3}PQ?lwo,Q]N0sN2Wzx}}i(PeKTx%I{Z`=6.n?RcT7PaqZ$ta$-9');
define('AUTH_SALT',        '+y4Y/=#Fm5<06PweCPi2]j,[38+8__@)I|b8b@gb>%ZYK]Q7r2`Xv}M,:aPw|FVB');
define('SECURE_AUTH_SALT', ',-ih8Bedr@.6]Yl4%$i7YLnXm)mMN<?[[>R,Ez7wh }^)w3;)*cniFIJ-^^,BrsF');
define('LOGGED_IN_SALT',   '`&|Yr)JFq9~?5kss6chUZvh_Hyx(?u6HRyD1/h@d%3P7MtG0we-=E^gVzdsH8/Ap');
define('NONCE_SALT',       '=?@DOt2CZ(zVO??-7>Z++O@){Cz_O>hi6SS5lI[Wtc+H,&eH9|b}U0c--!eK7!X)');

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
define( 'DISALLOW_FILE_EDIT', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define( 'WP_AUTO_UPDATE_CORE', false );
