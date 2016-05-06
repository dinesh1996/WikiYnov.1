<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../article.php';
require '../categories.php';

if (!isset($_GET['editpost'])) {
    $modif = new article();
    $toutcategorie = new categories();

    $toutcategorie = $toutcategorie->AdminVuCategorie();
    $modif = $modif->MiseAJour();
}


//
// else{
//   var_dump($_GET['editpost']);
//   //Retrieve the field values from our registration form.
//   $titre = !empty($_POST['titre']) ? trim($_POST['titre']) : null;
//   $contenu = !empty($_POST['contenu']) ? trim($_POST['contenu']) : null;
//   $categorie= !empty($_POST['categorie']) ? trim($_POST['categorie']) : null;
// echo "<br>";
//   var_dump($titre);
// echo "<br>";
//   var_dump($contenu);
// echo "<br>";
//   var_dump($categorie);
// echo "<br>";
//   var_dump($idarticle);
// echo "<br>";
//Construct the SQL statement and prepare it.
// $sql = "SELECT COUNT(username) AS num FROM posts WHERE titre = :titre";
// $stmt = $pdo->prepare($sql);
//
// //Bind the provided username to our prepared statement.
// $stmt->bindValue(':titre', $titre);
//
// //Execute.
// $stmt->execute();
//
// //Fetch the row.
// $row = $stmt->fetch(PDO::FETCH_ASSOC);

// if($row['num'] > 0){
//   die('Un article avec ce titre existe déjà.');
// }


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Description du site internet">
    <title>YNOV LOL CUP</title>
    <link href="css/bootstrap.css" rel="stylesheet">
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
            <form action="editerarticle3.php?id=<?= $_GET['id'] ?>" method="post" role="form">
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
                    <select id="rang" name="rang">
                        <option value="<?= $data->categorie; ?>">Catégorie actuelle
                            : <?= $data->categorie; ?></option>
                        <?php foreach ($toutcategorie as $data): ?>
                            <option value="<?= $data->titre;; ?>"><?= $data->titre;; ?></option>
                        <?php endforeach; ?>
                    </select>


                </div>
                <div class="button-panel">
                    <input type="submit" name="editpost" class="button" title="Modifier l'article"
                           value="Modifier l'article"></button>
                </div>
                <?php endforeach; ?>
            </form>
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
