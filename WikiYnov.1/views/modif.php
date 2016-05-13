<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require '../controllers/header_controller.php';
require '../models/article.php';
require '../models/categories.php';

if (!isset($_GET['editpost'])) {
    $modif = new article();
    $toutcategorie = new categories();
    $getid = $_GET['id'];
    $toutcategorie = $toutcategorie->AdminSeeSection();
    $modif = $modif->PrepareUpdate();
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Description du site internet">
    <title></title>
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

</div>


<!-- Content -->
<div class="main">
    <div class="hipsum">
        <div class="jumbotron">
            <h1 id="hello,-world!">Editer un article</h1>
        </div>
        <?php foreach ($modif as $data): ?>
        <div class="form-post">
            <form action="modif2.php?id=<?= $_GET['id'] ?>" method="post" role="form">
                <div class="form-item">
                    <label for="titre">Le titre :</label>
                    <input type="text" id="titre" name="titre" required="required"
                           value="<?= $data->titre; ?>"> </input>
                </div>
                <div id="sample">
                    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
                    <script type="text/javascript">
                        //<![CDATA[
                        bkLib.onDomLoaded(function () {
                            nicEditors.allTextAreas()
                        });
                        //]]>
                    </script>
                    <label for="cat">Insérer le contenu</label><br/>
            <textarea id="contenu" name="contenu" style="width: 100%; height: 200px;">
              <?= $data->contenu; ?>
            </textarea>
                </div>
                <div class="form-item">
                    <label for="categorie">Choisissez une catégorie</label>
                    <select id="categorie" name="categorie">
                        <option value="<?= $data->categorie; ?>">Catégorie actuelle
                            :


                            <?= $data->categorie; ?></option>
                        <?php foreach ($toutcategorie as $datacat): ?>
                            <option value="<?= $datacat->titre;; ?>"><?= $datacat->titre;; ?></option>
                        <?php endforeach; ?>
                    </select>


                </div>
                <div class="button-panel">
                    <input type="submit" name="editpost" class="btn btn-info" title="Modifier l'article"
                           value="Modifier l'article"></button>
                </div>
                <?php endforeach; ?>
            </form>


            <a href='ProjetReglage.php?id=<?= $_GET['id'] ?>'>
                <button class="btn btn-info" name="button">Retour</button>
            </a>
        </div>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
