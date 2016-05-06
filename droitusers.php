<?php
session_start();
require 'utilisateur.class.php';
require 'db.class.php';

if (($_SESSION['session']['rang']) == 'admin')
    echo 'salut';
else
    header('location:accueil.php');


