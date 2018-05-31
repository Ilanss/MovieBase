<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:47
 */

require_once ('models/utilisateur.model.php');

class utilisateurCtrl {

    public static function create(){
        $values = [
            ':login' => empty($_POST['login']) ? null : $_POST['login'],
            ':password' => empty($_POST['password']) ? null : md5($_POST['password']),
            ':email' => empty($_POST['email']) ? null : $_POST['email']
        ];

        (empty($values[':login']) OR empty($values[':password'])) ? $errors = "Veuillez remplir les 2 champs" : '';

        if(empty($errors)) {
            $errors = utilisateur::create($values);

            if (empty($errors)) {
                require_once('views/utilisateur/login.html.php');
            } else {
                require_once('views/utilisateur/create.html.php');
            }
        }
        else {
            require_once('views/utilisateur/login.html.php');
        }
    }

    public static function delete(){

    }

    public static function login(){
        $values = [
            ':login' => empty($_POST['login']) ? null : $_POST['login'],
            ':password' => empty($_POST['password']) ? null : md5($_POST['password'])
            ];

        (empty($values[':login']) OR empty($values[':password'])) ? $errors = "Veuillez remplir les 2 champs" : '';

        if(empty($errors)) {
            $errors = utilisateur::login($values);
            $admin = utilisateur::isAdmin($values);

            if (empty($errors)) {
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['id'] = utilisateur::getId($values);
                $_SESSION['admin'] = $admin['admin'];
                $success = "Welcome back ".$_SESSION['login']."!";
                require_once('views/home.html.php');
                unset($success);
            } else {
                require_once('views/utilisateur/login.html.php');
            }
        }
        else {
            require_once('views/utilisateur/login.html.php');
        }
    }

    public static function all(){

    }

    public static function find(){

    }

    public static function logout(){
        $_SESSION['login'] = '';
        $_SESSION['id'] = '';
        $_SESSION['admin'] = '';

        session_destroy();
        require_once ('views/home.html.php');
    }

}