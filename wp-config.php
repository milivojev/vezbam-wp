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
define('DB_NAME', 'portfolio2');

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
define('AUTH_KEY',         'Ejp][/`|^f_.;5.=zCiswW!m/#^>K q3]ajteugm4Ki(Y-}oVb9+NopROS.TZXMv');
define('SECURE_AUTH_KEY',  'PbKxd<9.`G_jjz3*Xoj0&jU|#^!K$y[7VZMV%AL/m_8Q8b1(o `l]vPN@/H)$`3M');
define('LOGGED_IN_KEY',    'he?cz89sNG`NjwL`k+o@[{#!7!ke;;Q9HXWzX,~>6_+C1#chc$O:/)bZmN>9&yo#');
define('NONCE_KEY',        'XHA7-2]oNHf9Kq>j  ZmpVKC,=a+}wdW*_{i[&*1H0O-Kyy?!<R0VY@Z^Jl>{~F1');
define('AUTH_SALT',        'a>Aq!.tHBk[Cd;?%&rt6wYb|FbqL=;DQ%=m4=zBbqUK$d:CUH[ql2zE/Xfx%L=0p');
define('SECURE_AUTH_SALT', '68))6q]Di4sl5+b-?PMZ>Pn<k^DDp[tR$HE:bfn(Nm2X*5?w+Q?JH_HP7vET5t_,');
define('LOGGED_IN_SALT',   'i*0?!pij`yVRFpWk~.~LNbqNH(V>30yKSsRa_)=|iXvK<S:&kN{*=1#j)8WGt/@L');
define('NONCE_SALT',       'veb_h:`M=nvW2V#e2it-t`}[9ltz&n6NZz>YW4nTk=2~|W[@~Lp69X]{?tGN=il4');

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
