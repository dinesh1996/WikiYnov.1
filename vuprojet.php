<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


require 'models/article.php';

$vuprojet = new article();
$getid = $_GET['id'];


$data = $vuprojet->SeeOneProject($getid);


echo '<pre>';
var_dump($data->active);
echo '</pre>';

if ($data->active != FALSE) {


    ?>


    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Y </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href="css/style.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    </head>
    <body>
    <!-- DEBUT DE LA NAVBAR -->


    <div class="post">
        <div>
            <h2><?php echo $data->titre; ?></h2>
        </div>
        <ul class="col-md-8 col-md-offset-2">
            <li><span class="fa fa-clock-o"></span> Article publié le <?php echo $data->date; ?>. Article posté
                par <?php echo $data->auteur; ?> dans la catégorie <?php echo $data->categorie; ?></li>
        </ul>
        <div class="col-md-8 col-md-offset-2">
            <p class="post-excerpt">
                <?php echo $data->contenu; ?>
            </p>

            <a class="btn btn-warning button" href="vu.php">Revenir à la liste d'article</a>

        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
};

?>