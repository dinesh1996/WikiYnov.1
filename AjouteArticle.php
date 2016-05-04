


<?php
/**
 * Created by PhpStorm.
 * User: ADM3
 * Date: 04/05/2016
 * Time: 10:07
 */


include 'article.php';
include 'connect.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);

$nouvarticle = new article();


//$categories = $pdo->query("SELECT * FROM categories");

if (isset($_POST['addpost'])) {
    $nouvarticle->setTitre(!empty($_POST['titre']) ? trim($_POST['titre']) : null);
    $nouvarticle->setContenu(!empty($_POST['contenu']) ? trim($_POST['contenu']) : null);
    $nouvarticle->setCategorie(!empty($_POST['categorie']) ? trim($_POST['categorie']) : null);


    echo '<pre>';
    echo var_dump($nouvarticle);
    echo '</per>';
 


    //$sqlv = "SELECT username FROM users WHERE id LIKE ? ";
    //$req = $pdo->prepare($sqlv);
    //$req->execute($auteurid);


    //$data = $req->fetch(PDO::FETCH_ASSOC);
    //$data = $data['username'];

 $nouvarticle->Ajouter($nouvarticle);


    echo "L'article a bien été ajouté";
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("AjouteArticle.php");</script>';

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> </title>

<body>



<!-- Content -->
<div class="main">
    <div class="hipsum">
        <div class="jumbotron">
            <h1 id="hello,-world!">Ajouter un article</h1>


        </div>
        <div class="form-post">

            <form action="AjouteArticle.php" method="post" role="form">
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
                        <?php foreach ($categories as $data): ?>
                            <option value="<?php echo $data['categorie']; ?>"><?php echo $data['categorie']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="button-panel">
                    <input type="submit" name="addpost" class="button" title="Ajouter un article"
                           value="Ajouter un article"></button>
                </div>
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
