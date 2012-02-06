<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'being_wp932');

/** MySQL database username */
define('DB_USER', 'being_wp932');

/** MySQL database password */
define('DB_PASSWORD', 'Soq7oP64gv');

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
define('AUTH_KEY',         '6kbr2rxblrehpulh0xovx10kxamlyycpexzhlccqfdxpxif8nbndqihygkqwq7oh');
define('SECURE_AUTH_KEY',  'yvmati9nd0cfriwap60ul6hw5bpiuq3liantywydrhysn1ldcsb6rnhbrlgs0i4d');
define('LOGGED_IN_KEY',    '0zbaw4kbmyhqmsnlq04mia4kip2t7p3i5fv0pdgyq5jx6phrcdgljzvlgnxxbgln');
define('NONCE_KEY',        '55hxbdcam8428odpj8gkqdqhfmmkckh905bmytucgzqopxnqzuji7yan7oq0f4qb');
define('AUTH_SALT',        'xcow6hbthwa1iuzc5efkggox2pjwpi7bybhumt1towgljx3rhntbmzlo2gackffj');
define('SECURE_AUTH_SALT', 'uj5lwicrhfb1iajjzcetv8szev5hr5xinap6vqmlms8cu1k8j0bktfj9eev94kw6');
define('LOGGED_IN_SALT',   'fwce6ppjewrc0veblxkxiy75rsv8aednx5eptsnsleclmieq75s7b93ktxsrklx5');
define('NONCE_SALT',       'oqpvhgv4mmqpqdsiddujp6nbmhfzbcgusxvjtm3pbaeo2u75ecpanoxdij1mj1cu');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
