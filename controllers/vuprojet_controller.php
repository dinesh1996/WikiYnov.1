<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);


require '../models/article.php';

if (isset($_SESSION['session'])) {
    if ($_SESSION['session']['rang'] === 'admin') {
        require "../views/includes/header_admin.php";
        // $id = $_GET['id'];
        $vuprojet = new article();
        if (isset($_GET['id'])) {
            $getid = htmlentities($_GET['id']);

            $data = ($vuprojet->SeeOneProject($getid));
            if ($data == false)
                header('location:vu_controller.php');
            else

                require "../views/vuprojet.php";
        } else
            header('location:vu_controller.php');


    } else
        header('location:accueil_controller.php');
} else
    header('location:accueil_controller.php');