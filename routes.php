<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:46
 */

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$request_uri = str_replace($base, '', $request_uri);

// Route it up!
switch ($request_uri[0]) {
    // Home page
    case '/':
        require 'views/home.html.php';
        break;
    // Everything else

    case '/film':
        require_once ('controllers/film.ctrl.php');
        filmCtrl::all();
        break;

    case '/film/create':
        if(isset($_POST['submit'])){
            require_once ('controllers/film.ctrl.php');
            filmCtrl::create();
        }
        elseif(isset($_POST['modify'])){
            require_once ('controllers/film.ctrl.php');
            filmCtrl::modify();
        }
        else {
            require('views/film/create.html.php');
        }
        break;

    case '/film/modify':
        require('views/film/create.html.php');
        break;

    case '/user/create':
        if(isset($_POST['submit'])){
            require_once ('controllers/utilisateur.ctrl.php');
            utilisateurCtrl::create();
        }
        else{
            require ('views/utilisateur/create.html.php');
        }
        break;

    case '/user/login':
        if(isset($_POST['submit'])){
            require_once ('controllers/utilisateur.ctrl.php');
            utilisateurCtrl::login();
        }
        else {
            require ('views/utilisateur/login.html.php');
        }
        break;

    case '/user/logout':
        require_once ('controllers/utilisateur.ctrl.php');
        utilisateurCtrl::logout();
        break;

    case '/mybase':
        if(isset($_SESSION['id'])){
            require_once ('controllers/film.ctrl.php');
            filmCtrl::allFromUser();
        }
        else {
            $notice = "Vous devez être connecté pour voir vos films";
            require_once ('views/utilisateur/login.html.php');
        }
        break;

    case '/user':
        require_once ('views/utilisateur/index.html.php');
        break;

    default:
        require 'views/404.php';
        break;
}