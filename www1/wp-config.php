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
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/streetlivo/www/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'wp_database');

/** MySQL database username */
define('DB_USER', 'user');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'cyFlApjIIRKsKzC4kF+5htqtL6MWwLVraTssPf1l2SrI+rms1fbblZ8sywP5');
define('SECURE_AUTH_KEY',  '4cCDD/SU+0AWPkHxCRgBkC9zCqRedSsZWbLVSPDxe/wKdJrHURT9fZkJw28P');
define('LOGGED_IN_KEY',    'xvdCYL9+lmnur1nyAV/J6Nv2l1vKWogM46aBY5NoU6Zr47U9golgaymLaIBG');
define('NONCE_KEY',        '4YLMA92H1uEDMm7K53E6e7A3qM6J+Bur66VCop8LzFOLe+QD3Sll1kcxlnEM');
define('AUTH_SALT',        'Pvv2BcSbs3qSc0M5obav62WAzeQ0Cdz48/dXSXBDAlPJwfnLNLBIJGR/U4JP');
define('SECURE_AUTH_SALT', 'sVlLjtVUllB2h+4jNZpbm5f897n6I/FkSJrB3IZjl2wLODG2LwZzVEbkWD8i');
define('LOGGED_IN_SALT',   'h03odNd75MyZfrm3lAV2a7UYudmE81OO8Bo/XhKqbBjVkgRuECyFv3Eu7ZsS');
define('NONCE_SALT',       'a4VOm9K477OymNWXWge8VBkGKMyOX/X+/PH9I2/ZdZdxpaSOf+erxdMkHmi0');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mod197_';

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

/* Fixes "Add media button not working", see http://www.carnfieldwebdesign.co.uk/blog/wordpress-fix-add-media-button-not-working/ */
define('CONCATENATE_SCRIPTS', false );

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
