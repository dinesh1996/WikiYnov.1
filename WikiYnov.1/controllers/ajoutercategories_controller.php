<?php
session_start();
require '../models/categories.php';


if (isset($_SESSION['session'])) {
    if ($_SESSION['session']['rang'] == 'admin') {
        require 'header_controller.php';
        require '../views/ajoutercategories.php';

    } else {
        echo "<script>alert('Vous n\'avez pas accès à cette page!')</script>";
        header('location:accueil_controller.php');
    }

} else {
    echo "<script>alert('Vous n\'avez pas accès à cette page, veuillez vous connecter.')</script>";
    header('location:accueil_controller.php');
}



error_reporting(E_ALL);
ini_set("display_errors", 1);

$categoriechoix = new categories();

$tokenplus = 'formAddCatégories';
$token = getToken($tokenplus);






function getToken($tokenplus){
    if(isset($_SESSION['token']) && !empty($_SESSION['token'])){
        return $_SESSION['token'];
    }
    else{
        $token = sha1(uniqid()) . $tokenplus. sha1(uniqid());
        $_SESSION['token'] = $token;
        return $token;
    }
}
function compareToken($token){
    if(isset($_SESSION['token']) && !empty($_SESSION['token'])){
        return ($_SESSION['token'] === $token) ;
    }
    else{
        return false;
    }
}

if (isset($_POST['addpost'])) {
    if (compareToken($token)) {
        $categoriechoix->setTitre(!empty($_POST['titre']) ? trim($_POST['titre']) : null);
        $categoriechoix->AdminAddSection($categoriechoix);

        echo "<script>alert('Catégorie bien ajoutée!')</script>";
        echo '<script language="JavaScript" type="text/javascript">window.location.replace("index.php");</script>';

    } else {
        echo "failed";
    }


}
