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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'DAUhYx2Zu8awORCMw0mfO1nZ33YYpofkIU7DR2Zbnby2fpHPdKDJqmYpmHnSG5+SDhDliyovGwVXkpBLVxjCvQ==');
define('SECURE_AUTH_KEY',  '4FNqoaHvkFvpMb51URyMVc+dkXILpBerqqj+3tYn9Mhb/stItEqAE5/yYeYUgiukwWnR1HaReKquAi6+7n17Dw==');
define('LOGGED_IN_KEY',    'v278d0aGwG6b64AQzHmgmI1WDSQl1F9EgG+gzSwHJDWD72qoMwCPz7z+UObO13UtA4MvWnv7RYjfcyWMSxkhZg==');
define('NONCE_KEY',        'ZTcDS/KbYRDkXgpRu1seY6qTX0fF5LCHUT4yRgNoeEOI/ayo9LPjrCnXwXbfpKUhV2I2IMHx9zz+ftRfoiJcrQ==');
define('AUTH_SALT',        'zdm9KeyAcsXq3SHnv3Ss52cY8CxHPc0W8wkd/dK+WRA7iWd+tDu/UdlAqqwxhEFBATHxlIzH+5Dh1F8Gk8udMg==');
define('SECURE_AUTH_SALT', 'ZFlRJKTN/oX6dy5fcDESeaINmmSAHylKN8QWW2KOtUTTkEtMW6MvBtBZyNsau1rFNlteLyq4zDlnaBDhA57uHg==');
define('LOGGED_IN_SALT',   'ONPWwBbxxVDcGS9NwMChDyd8MJddTBbK5DMK2xNJAaPmZTynJKzfDzHLaCTuCh1Yj0bDXmPjQRnoI7j5h6kNnQ==');
define('NONCE_SALT',       'WKLVUm94cNMb19yl1HhDjLHsYhtlQ+v29JfC+R4Xyt3j/YCHHj9/VxVeWDaRtb1Tu7uaC/A9HVlqZ5Dgozmo/A==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}

/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
if ( ! empty( $_SERVER['SERVER_SOFTWARE'] ) && strpos( $_SERVER['SERVER_SOFTWARE'], 'Flywheel/' ) !== false ) {
	$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
