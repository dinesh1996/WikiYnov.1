<?php
require '../views/includes/header_admin.php';

if (isset($_GET['gorech'])) {
    if (!empty($_GET['rechercher'])) {
        header("location: affichresul_controller.php");
    }
}


