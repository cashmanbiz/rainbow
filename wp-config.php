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
define( 'WPCACHEHOME', '/home/rainbowd/public_html/v2/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('WP_CACHE', true); //Added by WP-Cache Manager
define('DB_NAME', 'rainbowd_wrdp1');

/** MySQL database username */
define('DB_USER', 'rainbowd_wrdp1');

/** MySQL database password */
define('DB_PASSWORD', 'D6ptBupHN6Tpmsz');

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
define('AUTH_KEY',         'rz!VMvcrP1$b>!V^m!cQGO/htl>M1@ZNzO7tI1ndY|rn\`7jBOpdQ!bXNk*4>Y4Sr|8g;k|jl3:');
define('SECURE_AUTH_KEY',  'Q4)\`PO-:4p(YuXqzwBzVbF|BiwE8DsjXMBSY\`8xzJ)xUgJ6l4|M4#(G4>dRc2hCC^');
define('LOGGED_IN_KEY',    '@u:D00rpmI8/@aXqy;Wa|5oqlnK=!!SJuk#<5O4fj?*7~Hspzrw8Ko/br0\`hX!QmbA');
define('NONCE_KEY',        '~OuY^M5Iv2x87^)H~_WRH1|B:$8W;evd<q?pa2Z3umtJYnS)>YYI6b0qZ;lSo#<eN~3IBW~06DJ');
define('AUTH_SALT',        '!l6B?bq-Tp?5l?pBA-*zrgqj(YsI_!CbM3:7N)n9=*\`fdnvebN>/FL5y#?YJA(b__m^DZuCYdRqs^');
define('SECURE_AUTH_SALT', 'aKp*lwY48n>tM?LPYG^UI4Wez!2NI3CU_xTDrE@dbw\`MCdvM)rUk)5gxFIO-gF@Y!Gpi318ZiL');
define('LOGGED_IN_SALT',   'TQ4$WZR^0$(VL1om\`N\`d>S~mGDwvU!e!vNzQ8>X$Igwf|(Lu=U8$Ki$1Z=s4\`OB?_n~:VDk~16@');
define('NONCE_SALT',       'FA!<e?1IlZppKQ?bm_l->R)Fyo~Zvr*YOm;b4QhN4G^2we_Mb!XbA$s!02wmbMx4i');

/**#@-*/
define('AUTOSAVE_INTERVAL', 600 );
define('WP_POST_REVISIONS', 1);
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
define( 'WP_AUTO_UPDATE_CORE', true );
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_theme', '__return_true' );
