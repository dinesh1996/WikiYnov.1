<?php
session_start();
require '../models/utilisateur.class.php';
require '../models/db.class.php';

if (isset($_SESSION['session'])) {
    if ($_SESSION['session']['rang'] == 'admin') {
        require '../views/includes/header_admin.php';

    } else
        header('location:../accueil.php');

} else {
    header('location:../accueil.php');
}




