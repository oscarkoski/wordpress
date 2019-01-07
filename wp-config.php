<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wordpress');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'root');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'F8XKAnEh/HwQ*6>V~V VT,;:z{B./]7JjJy:h(OTySt(=<4?K4V)qNfSf_j<aH1z');
define('SECURE_AUTH_KEY', '`o4%54+<V+Xk}}VMKqbBQp&TI,-^d1I@(C2veduUpUy6FX- 8D^,^:qz wpuhc6|');
define('LOGGED_IN_KEY', 'I}V;*sP<SiTKEy_DWp?bZ ?yqSkA>)K[gp;=pczkY(f;Mu@.T--RR+&gM=15wTbg');
define('NONCE_KEY', 'CwHW9LzEGqxLH0ka_|f+a|xO5VzfP|h:b.UA-xJP/l]=fXClVOZ<ib.E>?0?vl%j');
define('AUTH_SALT', 'n/G4{f6Yx3&PupZJNOTRD<o*R:1 )-8M73y?VCTuG/m8#.8R9a7Z0fJG6!n{ :{{');
define('SECURE_AUTH_SALT', 'v7apF-%jOs1lqR!i=rmb)sv0FQt19dam(nU@Or8w@vLlz19k[aQ=N[$p#R;`o[XV');
define('LOGGED_IN_SALT', '/-E+2(ZwI*:Xz1tAqM_,~JiWlC+?|]YjlYa7BNiN^@prp Fs]oAxNbpq~gLDO<z-');
define('NONCE_SALT', '_G$LG{KD$oYH~?bvOQ]<|hg6Y.O`>1X;xT@]*@(S-/[JfhmJF-2E`!~;m9#y3hWI');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

