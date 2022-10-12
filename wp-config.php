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
define('DB_NAME', 'hopebalihope');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '+={A3_7h,$p$?R<5Ljck_b%FPPnVkaqRJEte+S>wl)2u&Jk8fO`O.A]>w%B~yGPA');
define('SECURE_AUTH_KEY',  '(5 67(+ g+CXUfA7bVjbH!oyNymsi7!3)H<f;tF/w`7ii7&+sRj>WK<3EGz^,n~>');
define('LOGGED_IN_KEY',    'Y3n6*Y3Z{tQ6G7KLGQP0yH-CiIN@*qT3[J]FyUoERt$:j<}/><Q<Z~2EI6{3OMc9');
define('NONCE_KEY',        'Av,CkQ9f/@&+]&wjJMC@{(d9b0HwjCnFuhfU~%-4 m>?8[V8m(UiBJFIQn&Q`0JN');
define('AUTH_SALT',        '>WEQai>KMT;h3^Uj?(,q7E]6otavXi#N)^$@P|Otxm%Vne/~u&&Lm5)EF$ue+y~%');
define('SECURE_AUTH_SALT', '~jv|:a*kf.o{lay_k?zG@0;[mh3VODh3|cm2?K}D@.mT5:/5taqdZNMA6/HE$<(H');
define('LOGGED_IN_SALT',   '~+xRRn}<uJxS)dQwIT)(h(N_MBcr<#DhOWmfHo-AXA4k8OU3iAf78g=/uKcg4u!$');
define('NONCE_SALT',       'em#n3H-)7*j${JFC$6)Ugv&e3?AN|JsAetS~tT8j*S^k%(Py+mv$^6|yt%|sh*]c');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
