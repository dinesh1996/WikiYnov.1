<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


require '../article.php';
require '../categories.php';

if (!isset($_GET['editpost'])) {
    $modif = new article();


    $modif->setTitre(!empty($_POST['titre']) ? trim($_POST['titre']) : null);
    $modif->setContenu(!empty($_POST['contenu']) ? trim($_POST['contenu']) : null);
    $modif->setCategorie(!empty($_POST['categorie']) ? trim($_POST['categorie']) : null);


    echo '<pre>';
    echo var_dump($modif);
    echo '</per>';


 

   $modif->Update($modif);





    echo "L'article a bien été ajouté";
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("index.php");</script>';



    echo 'pass';
}



