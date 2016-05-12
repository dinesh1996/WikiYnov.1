<?php

session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../models/article.php';
require '../models/categories.php';


error_reporting(E_ALL);
ini_set("display_errors", 1);

if (isset($_SESSION['session'])) {
    if ($_SESSION['session']['rang'] === 'admin') {
        require "../views/includes/header_admin.php";
        $vuarticle = new article();
        $categoriechoix = new categories();
        $categoriechoix = $categoriechoix->AdminSeeSection();
        if (isset($_GET['choix'])) {
            $cat = $_GET['categorie'];
            $resultat = $vuarticle->Seewithcat($cat);

        } else {
            $resultat = $vuarticle->See();
        }

    } elseif ($_SESSION['session']['rang'] == "abonné") {
        require "../views/includes/headerV.php";
        $vuarticle = new article();
        $categoriechoix = new categories();
        $categoriechoix = $categoriechoix->AdminSeeSection();
        if (isset($_GET['choix'])) {
            $cat = $_GET['categorie'];
            $resultat = $vuarticle->Seewithcat($cat);

        } else {
            $resultat = $vuarticle->See();
        }

    }

    require "../views/vu.php";
} else
    header('location:accueil_controller.php');



