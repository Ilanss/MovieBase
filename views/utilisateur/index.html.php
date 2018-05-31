<?php
/**
 * Created by PhpStorm.
 * User: ilans
 * Date: 28.05.18
 * Time: 18:02
 */

if($_SESSION['admin']){

}
else{
    $errors = "Vous devez être admin pour accéder à cette page!";
    require_once ('views/layouts/notice.php');
}