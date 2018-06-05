<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:46
 */


/* --- Charge la configuration utilisateur --- */
require_once ('database.php');
require('Smarty/Smarty.class.php');
$smarty = new Smarty();
session_start();
$base = require_once('config.php');
$base = $base['SITE_ROOT'];
$_SESSION['root'] = $base;
// Sauvegarde de la connexion à la BD pour la réutiliser à d'autres endroits de l'application

/* --- Chargement des routes --- */
require_once ('views/layouts/nav.html.php');
require_once('routes.php');
require_once ('views/layouts/footer.html.php');