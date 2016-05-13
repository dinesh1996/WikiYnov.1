<?php
session_start();

require '../models/categories.php';
require '../models/article.php';
require '../tokens.php';

if (isset($_SESSION['session']))
    if ($_SESSION['session']['rang'] === 'admin')
        require 'header_controller.php';
if ($_SESSION['session']['rang'] === 'auteur' || $_SESSION['session']['rang'] === 'admin')
    require '../views/index.php';
else
    header('location:../controllers/accueil_controller.php');