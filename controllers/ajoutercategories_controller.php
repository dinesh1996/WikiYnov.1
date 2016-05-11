<?php
session_start();
require '../models/categories.php';
require '../tokens.php';

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