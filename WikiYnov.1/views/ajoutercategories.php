<?php


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
        echo '<script language="JavaScript" type="text/javascript">window.location.replace("index_controller.php");</script>';

    } else {
        echo "failed";
    }


}


?>

<div class="main">
    <div class="hipsum">
        <div class="jumbotron">
            <h1 id="hello,-world!">Ajouter une catégorie</h1>


        </div>
        <div class="form-post">

            <form action="ajoutercategories_controller.php" method="post" role="form">
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
        <a href="../views/index.php">
            <button type="button" class="btn btn-info" name="button"> Revenir à la liste
                des porjets
            </button>
        </a>
    </div>
</div>

<?php require 'includes/footer.php'; ?>