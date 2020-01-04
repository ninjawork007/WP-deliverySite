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
define( 'DB_NAME', 'mpdmro_deliveryammos' );

/** MySQL database username */
define( 'DB_USER', 'mpdmro_deliveryammos' );

/** MySQL database password */
define( 'DB_PASSWORD', '2askdG[SDDDDpnd\'PAD23' );

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
define( 'AUTH_KEY',         'B$G~EwIJ;|9V*}<& U9K&TR#S0|-.CkGa#tXpMG/c]y]:8VL^#@{:HDVDk{?MLMa' );
define( 'SECURE_AUTH_KEY',  'K[~l&*;`*;I[Ev$y*c1r86e545L!EiAqa:H9shJ:XKBgBslblb)>/89Zg@Z|}0L|' );
define( 'LOGGED_IN_KEY',    'u5j0b{v&jo?e _~w8@HCEMQW3#3]]2;~.bQnn4v5sPYE}u@#1I.U,g},XUZSXanw' );
define( 'NONCE_KEY',        '32@;8sH-^Mg=u$_(U7AnKj{G=M7 $2(-fFgVjx[ej1:_qtpK!LM*6?P3}!V-Duvw' );
define( 'AUTH_SALT',        '$EM)UaS)o:pfFu`-$H8s`|zd**t/u4Hd}DyCgl)oPSb.]}hsPWqQ0gDwu63wg@.d' );
define( 'SECURE_AUTH_SALT', 'qg+/AoI/ZD>50x$4`M7,[v)I<&YD _J5eef@r:8JBTCaiwV$Ktn*z(Sp(gIuhW*Q' );
define( 'LOGGED_IN_SALT',   '?Y.`7?SyTB;CrVA_~/g4Jqp}S3j!#2b{:_JL/[J,hx0h70k8_Im9e2^#|Tcoc4K]' );
define( 'NONCE_SALT',       'cVy-91hFU6lI=)_AA,;9%1kB:^{Y^hO>}sf8PKW@+]IwcQiIibxZah$CNE5P/c;w' );

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
