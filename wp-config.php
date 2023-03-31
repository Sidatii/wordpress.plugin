<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'plugin' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'gm-bC.rfU)-X90w2RRYK1hwzzD/}Z:j1ejlXDVZsE+<bc $(7Rt&N[l&-J0_S*~ ' );
define( 'SECURE_AUTH_KEY',  '|3MhJb?Bycp9>vAcS6h.*l[tP1[&)qghc|v02qsJF;T[3|xMtD0xy#RU28|awyD0' );
define( 'LOGGED_IN_KEY',    'R(e/7kU?Dc|IhBEApaaU5jas];7:v(i=v ?gXNz^<dO]zclP^dif6A>7_/8YY5ar' );
define( 'NONCE_KEY',        'P{ IW3IG.i?1b?QD]gD#9dDr2QHdqsFEjM/:5?0.k T_VW<J%Nd9s38ZkM#1@aZ8' );
define( 'AUTH_SALT',        '{F4pIi^@yz`C$TIgOyJ1D]8uUhmN>m:p3$OQ,##WAT*9BBtIo2i8?%wkq}&m$Yku' );
define( 'SECURE_AUTH_SALT', 'Jk{F,#fpS.[AOVh)#w)Kf~,dkTB>]xU:[MHN_W?nA4xwi`kVP<Ge8CT@.EqjfkH*' );
define( 'LOGGED_IN_SALT',   'P`XX%7@!4{NdxSU2aU#Ryw3[,kZ&0aNiVQft,to+N*9oGal!JttBNSlr(Wi^;Mgw' );
define( 'NONCE_SALT',       '%`gs2cO4/id7zaon.cubYtH%(bh{E,s3,vqv-@zF>$oT*cK/c-QK5aNFxOCl;YiK' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
