<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'mysql' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '^#GMKWV072SFs83K.26H7{iHflL3,viKKL;NfS!Hu:qs*tRt&YhFTA6/OtxzjfFs' );
define( 'SECURE_AUTH_KEY',  '._}+,(,Tn_2:N;CU8n:,O,L{KR6RXqDKlT,$dXt4`3y7eZ>w61[xX;jL@WO9K38P' );
define( 'LOGGED_IN_KEY',    'W F>.](&F)DDFXz]q9RX~y?~<X|=GW2U5:.~ileE[$.?wVg:_ FuprsjcPLK~JS^' );
define( 'NONCE_KEY',        'S)?O*3C}^9,oMy24C<.wafHWb7Z:Tc_L@,.$,TqQ9-`5dah[omcH1!E{G;E<0n-T' );
define( 'AUTH_SALT',        'cl((b=#X2F6*|HL/+o5_S+hn[Yq3pS[?,$q&et`A!9A1DVmR$|~JOU=m _sAh]z%' );
define( 'SECURE_AUTH_SALT', '*Ufgr7+SZ6#k*kJHK;b%$Lm7djj~Hx+7{1X-EYNg%[O>y@xaZ|0$lNBR{FJiN~ji' );
define( 'LOGGED_IN_SALT',   'GpL/9hd!xrG[pG6f~b9iWs}!]ZHs0+UTuZijVF[?0njj35s?Te0``He*brGFIrY.' );
define( 'NONCE_SALT',       'lLv4>uK6rF}z;0tK-RaZ*a8:DrbOi~?Jr8},PMsU[aN$fJVjdDC!s0o5ct#^O63>' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_diw';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
