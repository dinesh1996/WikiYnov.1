<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'models/article.php';
require 'models/categories.php';


error_reporting(E_ALL);
ini_set("display_errors", 1);


$vuarticle = new article();
$categoriechoix = new categories();
$categoriechoix = $categoriechoix->AdminSeeSection();
if (isset($_POST['choixthématique'])) {
    $cat = $_POST['categorie'];



    $resultat = $vuarticle->Seewithcat($cat);




} else {


    $resultat = $vuarticle->See();
}

?>


<html lang="fr">
<head>
    <meta charset="utf-8">

    <title>Y </title>

</head>
<body>

<!-- FIN DE LA NAVBAR -->


<div class="posts-box posts-box-6">
    <div>
        <h2 class="title">Les articles publiés</h2>
    </div>


    <div>
        <div class="form-post">

            <form action="vu.php" method="POST" role="form">


                <div class="form-item">
                    <label for="categorie">Choisissez une catégorie</label>
                    <select id="categorie" name="categorie">
                        <?php foreach ($categoriechoix as $data): ?>
                            <option value="<?php echo $data->titre; ?>"><?php echo $data->titre; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="button-panel">
                    <input type="submit" name="choixthématique" class="btn btn-info" title="Ajouter un article"
                           value="Ajouter un article"></button>
                </div>


            </form>


        </div>


    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 post">
            <?php


            foreach ($resultat as $data): ?>
                <div>
                    <h2>
                        <?php echo "<a href='vuprojet.php?id={$data->id}' > {$data->titre} </a>" ?>
                    </h2>
                </div>
                <div>
                    <ul>
                        <li><span class="fa fa-clock-o"></span>Articlé publié le <?php echo $data->date; ?></li>
                    </ul>
                </div>
                <div>
                    <p>
                        <?php $extrait = substr($data->contenu, 0, 400);
                        echo " '$extrait' <a href='vuprojet.php?id={$data->id}' "; ?> >...Lire la suite</a>
                    </p>
                </div>
                <div>
                    <ul>
                        <li>Article posté par <?php echo $data->auteur; ?> dans la
                            catégorie <?php echo $data->categorie; ?></li>
                    </ul>
                </div>
            <?php endforeach; ?></div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
