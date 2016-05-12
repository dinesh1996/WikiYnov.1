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
        //$id = htmlentities($_GET['id']);

        if (isset($_GET['gorech']) && !empty($_GET['rechercher'])) {
            $rech = htmlentities(addslashes(strtolower($_GET['rechercher'])));
            $resultat = $vuarticle->recherche($rech);
            //$nom = $vuarticle->affName($id);
            require "../views/affichageresul.php";
        }

    } elseif ($_SESSION['session']['rang'] === "abonné")
        require "../views/includes/headerV.php";


} else
    header('location:accueil_controller.php');



