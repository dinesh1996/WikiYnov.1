<?php


error_reporting(E_ALL);
ini_set("display_errors", 1);

$nouvarticle = new article();
$categoriechoix = new categories();
$categoriechoix = $categoriechoix->AdminSeeSection();
$tokenplus = 'formAdd';
$token = getToken($tokenplus);


//$categories = $pdo->query("SELECT * FROM categories");


//TRAITEMENTS
//..


if (isset($_POST['addpost'])) {
    if (compareToken($token)) {
        $nouvarticle->setTitre(!empty($_POST['titre']) ? trim($_POST['titre']) : null);
        $nouvarticle->setContenu(!empty($_POST['contenu']) ? trim($_POST['contenu']) : null);
        $nouvarticle->setCategorie(!empty($_POST['categorie']) ? trim($_POST['categorie']) : null);
        $nouvarticle->Add($nouvarticle);


        echo "L'article a bien été ajouté";
        echo '<script language="JavaScript" type="text/javascript">window.location.replace("index_controller.php");</script>';
//..
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
            <h1 id="hello,-world!">Ajouter un article</h1>


        </div>
        <div class="form-post">

            <form action="ajoutearticle_controller.php" method="post" role="form">
                <div class="form-item">
                    <label for="titre">Le titre :</label>
                    <input type="text" id="titre" name="titre" required="required" placeholder="Titre">  </input>
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
                    <label for="contenu">Insérer le contenu</label><br/>
            <textarea id="contenu" name="contenu" style="width: 100%; height: 200px;">
            </textarea>
                </div>
                <div class="form-item">
                    <label for="categorie">Choisissez une catégorie</label>
                    <select id="categorie" name="categorie">
                        <?php foreach ($categoriechoix as $data): ?>
                            <option value="<?php echo $data->titre; ?>"><?php echo $data->titre; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <input type="hidden" name="token" id="token" value="<?= $token; ?>"/>
                <div class="button-panel">
                    <input type="submit" name="addpost" class="btn btn-info" title="Ajouter un article"
                           value="Ajouter un article"></button>
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
<?php require 'includes/footer.php'; ?>