<?php
/**
 * Created by PhpStorm.
 * User: ADM3
 * Date: 04/05/2016
 * Time: 10:07
 */


require '../models/categories.php';
require '../models/article.php';
require '../tokens.php';
require '../controllers/header_controller.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);

$categoriechoix = new categories();
$tokenplus = 'formAddCatégories';
$token = getToken($tokenplus);

if (isset($_POST['addpost'])) {
    if (compareToken($token)) {
        $categoriechoix->setTitre(!empty($_POST['titre']) ? trim($_POST['titre']) : null);
        $categoriechoix->AdminAddSection($categoriechoix);

        echo "<script>alert('Catégorie bien ajoutée!')</script>";
        echo '<script language="JavaScript" type="text/javascript">window.location.replace("index.php");</script>';

    } else {
        echo "failed";
    }


}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <title></title>

<body>


<!-- Content -->
<div class="main">
    <div class="hipsum">
        <div class="jumbotron">
            <h1 id="hello,-world!">Ajouter une catégorie</h1>


        </div>
        <div class="form-post">

            <form action="ajoutercategories.php" method="post" role="form">
                <div class="form-item">
                    <label for="titre">Le titre :</label>
                    <input type="text" id="titre" name="titre" required="required" placeholder="Titre"></div>


                <div class="button-panel">
                    <input type="hidden" name="token" id="token" value="<?= $token; ?>"/>


                    <input type="submit" class="btn btn-info" name="addpost" title="Ajouter une catégorie"
                           value="Ajouter une catégorie"> </button>
                </div>
            </form>
        </div>
        <a href="index.php">
            <button type="button" class="btn btn-info" name="button"> Revenir à la liste
                des porjets
            </button>
        </a>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
