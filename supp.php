<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


require 'article.php';

$supprojet = new article();
$getid=$_GET['id'];

$data = $supprojet->Supprimer($getid);
echo 'done';
?>
