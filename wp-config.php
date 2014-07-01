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
define('DB_NAME', 'testtheh1_wp');

/** MySQL database username */
define('DB_USER', 'testtheh1_wp');

/** MySQL database password */
define('DB_PASSWORD', 'dG4GPP8w');

/** MySQL hostname */
define('DB_HOST', '10.168.1.47');

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

define('AUTH_KEY',         '?!!``eB~SfmUG#$%CAc||ReOHp}@t*b>NOfsUblzGs0WS|-Iw *cq~l^|#% )T2*');
define('SECURE_AUTH_KEY',  ':r67;dG-aXYr[=r|Dr/n|o*Zo^cKPi05HJ>qsUYN.FvU^YO[U)>qu`Fl-0+E4y-E');
define('LOGGED_IN_KEY',    '/]G3EIe_Rx.{||jK)<X&Dp*3[+laog,Vs>Z1vZ9by$n6gkYV^Z8(q#p*Tvk+X[Gn');
define('NONCE_KEY',        '!otO$EmX`+/5-(0{jwCQ[GG1rwn:758,[]9aTGFg{(6#ZH__fbu{4AP`-/`p/Z^!');
define('AUTH_SALT',        '~]-=*xK8>-dkov~=VL eWdo(#K23H)5kgQAe_=Dfg)4s(SZc-!I6J.494n5L$g^1');
define('SECURE_AUTH_SALT', 'b9^d%U:$sT:5fo`_)k+Xm?PXr^mC>}>{Fy|[|%9/}^XaTM{>ls|$`sAB;]E?Av0X');
define('LOGGED_IN_SALT',   '0k[q[y Y-d-hh!5zbO@{?H-v12 k:OZ|y,Wz=@-Tp?j8dRJ3kMDSh$BAGV8?d%bB');
define('NONCE_SALT',       'fCtLH&1Pv42;1=P@fu}G.OX`20K*5-]*{1dQuB{ue6&TJi)kb]g08daau0LFC1m*');


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
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
