<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 17:48
 */

require_once ('models/film.model.php');

class filmCtrl{

    public static function create(){
        $values = [
            ':title' => empty($_POST['title']) ? null : $_POST['title'],
            ':image' => ($_FILES['image']['size'] == 0) ? $_SESSION['root'] . "/assets/img/poster-placeholder.png" : $_SESSION['root'] . "/assets/img/poster/" . basename($_FILES['image']['name']),
            ':description' => empty($_POST['description']) ? null : $_POST['description']
        ];

        (empty($values[':title']) OR empty($values[':description'])) ? $errors = "Veuillez donner un titre et une description" : '';

        if(empty($errors)) {
            if(($_FILES['image']['size'] != 0)) {
                $uploadfile = ".." . $_SESSION['root'] . "/assets/img/poster/" . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {}
                else {
                    $errors = "Erreur au transfert de l'image...";
                    require_once('views/film/create.html.php');
                }
            }
            if(empty($errors)) {
                $errors = film::create($values);

                if (empty($errors)) {
                    $success = "Le film " . $values[':title'] . " a été créé!";
                    require_once('views/film/index.html.php');
                    unset($success);
                } else {
                    $errors = "Une erreur s'est produite lors de l'insertion du film dans la base de donnée...";
                    require_once('views/film/create.html.php');
                    unset($errors);
                }
            }
        }
        else {
            require_once('views/film/create.html.php');
        }
    }

    public static function modify(){
        $values = [
            ':title' => empty($_POST['title']) ? null : $_POST['title'],
            ':image' => ($_FILES['image']['size'] == 0) ? $_SESSION['root'] . "/assets/img/poster-placeholder.png" : $_SESSION['root'] . "/assets/img/poster/" . basename($_FILES['image']['name']),
            ':description' => empty($_POST['description']) ? null : $_POST['description'],
            ':id' => $_POST['id']
        ];

        (empty($values[':title']) OR empty($values[':description'])) ? $errors = "Veuillez donner un titre et une description" : '';

        if(empty($errors)) {
            if(($_FILES['image']['size'] != 0)) {
                $uploadfile = ".." . $_SESSION['root'] . "/assets/img/poster/" . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {}
                else {
                    $errors = "Erreur au transfert de l'image...";
                    require_once('views/film/create.html.php');
                }
            }
            if(empty($errors)) {
                $errors = film::modify($values);

                if (empty($errors)) {
                    $success = "Le film " . $values[':title'] . " a été modifié!";
                    require_once('views/film/index.html.php');
                    unset($success);
                } else {
                    $errors = "Une erreur s'est produite lors de l'insertion du film dans la base de donnée...";
                    require_once('views/film/create.html.php');
                    unset($errors);
                }
            }
        }
        else {
            require_once('views/film/create.html.php');
        }
    }

    public static function delete(){

    }

    public static function all(){
        if(isset($_SESSION['id'])){
            $values = [
              ':id' => $_SESSION['id']
            ];
            $films = film::allFilmPlusList($values);
        }
        else {
            $films = film::all();
        }
        require_once ('views/film/index.html.php');
    }

    public static function allFromUser(){
        $values = [
            ':id' => $_SESSION['id']
            ];

        $films = film::filmFromUser($values);
        require_once ('views/film/index.html.php');
    }

    public static function find(){

    }

    public static function add(){
        $values = [
            ':idFilm' => $_POST['id'],
            ':idUser' => $_SESSION['id']
        ];

        require_once ('models/userHasFilm.model.php');

        $errors = userHasFilm::add($values);

        if(empty($errors)){
            $success = "Le film a été ajouté à votre liste";
            $values = [
                ':id' => $_SESSION['id']
            ];
            $films = film::allFilmPlusList($values);
            require_once ('views/film/index.html.php');
            unset($success);
        }
        else{
            $errors = "Une erreur s'est produite lors de l'insertion du film dans votre liste...";
            require_once('views/film/index.html.php');
            unset($errors);
        }
    }

    public static function view(){
        $values = [
            ':idFilm' => $_POST['vu'],
            ':idUser' => $_SESSION['id']
        ];

        require_once ('models/userHasFilm.model.php');

        $errors = userHasFilm::view($values);

        $values = [
            ':id' => $_SESSION['id']
        ];
        $films = film::allFilmPlusList($values);

        if(empty($errors)){
            $success = "Le film à été coché comme vu!";
            require_once ('views/film/index.html.php');
            unset($success);
        }
        else{
            $errors = "Une erreur s'est produite lors de l'ajout au film vu...";
            require_once ('views/film/index.html.php');
            unset($errors);
        }
    }
}