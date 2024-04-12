<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'q$ORPSFs#xIs44}5)4C6+^Wfj<>53m3;#/iM|x^M<FL3Va=x&~+!DOFB$ln0D(oV' );
define( 'SECURE_AUTH_KEY',   'sen!_zx6pp+ cwEFP^KV-{RWdeG3rQyS6O]mxdn*NAYt,YG C`:Rug2T2%NE*6)n' );
define( 'LOGGED_IN_KEY',     '>Fi86PL3tvpdBA*jrtJ>K u{%`4,vBJbxW`ZUHmg[BMDH=>bIV#~}&9JV!ra%RjY' );
define( 'NONCE_KEY',         'yUmA#XBj:H,l!BmQ0II0D~Hjj@C>#:}7FM~mh=2bjQa=n#mAB]{=^r6q=}?Qm%@*' );
define( 'AUTH_SALT',         '8v{)DCat2= LA1uG=`S%S0@wyXB<7)M8-q!09Q-UZzq:Q8JDIQtV:LCCm_}wbboc' );
define( 'SECURE_AUTH_SALT',  'M^k4q9(RbH*xlHfIPyB^r9HT~! ,F(dRn0`qR^b)y^-0>uXo:AiDT!WGl(p(Me4%' );
define( 'LOGGED_IN_SALT',    '[D3P^yo2R+&C_iPYQr9kKGp^)8x~on+W+[86i7fWK;U_z>2/$7=b02&?b`MUrvgt' );
define( 'NONCE_SALT',        'j~PG7L[6SS?ej3oO:j92GSgQ/1!SP-C3W:[lqOW[mna/]N2<T|eQw)Y!k3Na~W0T' );
define( 'WP_CACHE_KEY_SALT', '~ Fxa)Psy$:XQH6GMtK$38SnKG@S[AB30bo(nBn_U3YY-f5t7<j)8??Rqs>&GJBU' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
