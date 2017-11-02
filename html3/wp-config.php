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
define('DB_NAME', 'db61425_fitness');

/** MySQL database username */
define('DB_USER', 'db61425_fitness');

/** MySQL database password */
define('DB_PASSWORD', '123321123');

/** MySQL hostname */
define('DB_HOST', 'internal-db.s61425.gridserver.com');

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
define('AUTH_KEY',         'rh@o(y+f@)2HNugZheZT`_2umbmff_NF8!c-30viR|&v|A$Bh`Tg*Q7KLZQ.Y!Yv');
define('SECURE_AUTH_KEY',  'USnL0Y3tz5U^u%T$n!sR9UAu(t?ac-N}pLHO+Rw9oo,i{$PV1+NQ=,$ocv.Y{TSn');
define('LOGGED_IN_KEY',    'DV?N/$2:ooy+dn+sXHeOn1x{w:r~5:[?e<*vShK:[RL%GiLrzBBq^l)gEbGWf<F4');
define('NONCE_KEY',        'y|iK)bAp+Z$*p~!FA_IE}qz6z+xA+^O By0[F~`+aXXUs*U*B~<aR$?;^z#][0Ei');
define('AUTH_SALT',        't Qw5+w{I;x+>5>%1R[T(H=~VAqLA6Kmm&y>4.Z/Z<=RuASus{Mu9(|&rVs|C1@6');
define('SECURE_AUTH_SALT', 'uDPSDwGEV2pyH{saw^ZFV-(.P7lhHqm,+|rno*H($J 2#;b_oc,^!-RX$S;[8Xxq');
define('LOGGED_IN_SALT',   'HX%ElmU.[LW9;GU@U7DnzBoe/{Tnan3-Idql^2$86~%@HBDzj$%E/HM#KYvu5RAt');
define('NONCE_SALT',       'u5tu,][%:Ig=J@pv::U[VxpL~0Gi|uRJwGt`:eh<JWo$nb|,I2.s2CjzA3mU~Q }');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wppp_';

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
