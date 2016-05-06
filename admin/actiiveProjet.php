<?php
/**
 * Created by PhpStorm.
 * User: ADM3
 * Date: 06/05/2016
 * Time: 20:10
 */


error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../article.php';
$activearticle = new article();


$activearticle = $activearticle->AdminVu();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Description du site internet">
    <title>YNOV LOL CUP</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="../css/style2.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="header">
    <a href="#" id="menu-action">
        <i class="fa fa-bars"></i>
        <span>Fermer</span>
    </a>
    <div class="logo">
        Administration Ynov LoL Cup
    </div>
</div>


<!-- Content -->
<div class="main">
    <div class="hipsum">
        <div class="jumbotron">
            <h1 id="hello,-world!">Les articles</h1>
            <p>Via le tableau ci-dessous vous avez en un coup d'oeil tous les articles postés sur le site du plus récent
                article au plus vieux.</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <button type="button" class="btn btn-info" name="button"><a href="AjouteArticle.php">Ajouter un article</a></button>

                    <button type="button" class="btn btn-warning" name="button"><a href="ajoutercategorie.php">Ajouter
                            une catégorie</a></button>
                    <br/><br/>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Tout les projets</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($activearticle as $data): ?>
                            <tr>
                                <th scope="row">
                                    <?php $extrait = substr($data->titre, 0, 60);
                                    echo "  <a href='ProjetReglage.php?id={$data->id}' "; ?> > <?= $extrait ?>
                                    </a>
                                </th>


                                <?php endforeach ?>
                            </tr>

                            </tbody>
                        </table>
                    </div><!--end of .table-responsive-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
