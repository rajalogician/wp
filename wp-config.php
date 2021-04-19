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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp105' );

/** MySQL database username */
define( 'DB_USER', 'wp105' );

/** MySQL database password */
define( 'DB_PASSWORD', '1R5O8p(S]6' );

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
define( 'AUTH_KEY',         'iu6okt7tidenaewupds5x2zf3ibluhvbrevs1ksscbrqpbkxafy3uwlgd29oe1fu' );
define( 'SECURE_AUTH_KEY',  'csyqfe14sfg1qcqocmebl7fjofsuef7qbtijjnqckts5fhxcmwnels7urslulnyo' );
define( 'LOGGED_IN_KEY',    'uy1ddpd1dahanecm1kyegb3nnhxjycqtexscagt1f0r9prvhbwhia2hevqrtnofm' );
define( 'NONCE_KEY',        'tzvxdrjlitcpyvpgprukfkmt6t3rrvndujdeejlubbogbgnj8exbt8jhpkjignhw' );
define( 'AUTH_SALT',        'q9seprtardiuvgjqqelyy8bou1eyxpjsb0fscnhhctk5j2sq5n2luicmszmhxejs' );
define( 'SECURE_AUTH_SALT', 'wkadfehrprcryzsblsvtrughiclfdlcfntpnl3kgib0vgaevqmwvszsetir3f56m' );
define( 'LOGGED_IN_SALT',   'pz0neeapp3acyfrcpdr3zq0eu3j15fbo4h8qjdfire4oq0uajk2wncbgttsnpopq' );
define( 'NONCE_SALT',       'oucm4ybkvnt7f5f6xapsz7omyo9wnz3vx4keunzje0lvtoamlgbarjfoili1rj9z' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
