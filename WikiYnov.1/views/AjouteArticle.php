<?php


require '../models/uploding.php';

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

        echo "<script>alert('  L\'article a bien été ajouté  ');</script> ";


//..


// create a whitelist of the extensions


        $allowedExts = array('gif', 'jpeg', 'jpg', 'png', 'pdf', 'avi', 'mp4');
// obtain the extension of the uploaded file and storeit in a variable
        $explodeimage = explode('.', $_FILES['image']['name']);
        $explodepdf = explode('.', $_FILES['pdf']['name']);
        $explodevideo = explode('.', $_FILES['video']['name']);
        $extensionimage = mb_strtolower(end($explodeimage));
        $extensionpdf = mb_strtolower(end($explodepdf));
        $extensionvideo = mb_strtolower(end($explodevideo));


//echo finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['file']['tmp_name']);
// validate the content-type header of uploaded file
        if ((($_FILES['image']['type'] == 'image/gif')
                || ($_FILES['image']['type'] == 'image/jpeg')
                || ($_FILES['image']['type'] == 'image/jpg')
                || ($_FILES['image']['type'] == 'image/pjpeg')
                || ($_FILES['image']['type'] == 'image/x-png')
                || ($_FILES['image']['type'] == 'image/png')
                || ($_FILES['video']['type'] == 'video/x-msvideo')
                || ($_FILES['video']['type'] == 'video/mp4')
                || ($_FILES['pdf']['type'] == 'application/pdf'))
            && ($_FILES['image']['size'] < 1000000000) && ($_FILES['pdf']['size'] < 1000000000) && ($_FILES['video']['size'] < 1000000000)
// validate file extension
            && in_array($extensionimage, $allowedExts)
            && in_array($extensionpdf, $allowedExts)
            && in_array($extensionvideo, $allowedExts)

// check file content and derive the actual content-type, the validate it with the allowed content-types
            && (finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['image']['tmp_name']) == 'image/gif'
                || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['image']['tmp_name']) == 'image/jpeg'
                || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['image']['tmp_name']) == 'image/jpg'
                || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['image']['tmp_name']) == 'image/pjpeg'
                || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['image']['tmp_name']) == 'image/x-png'
                || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['image']['tmp_name']) == 'image/png'
                || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['video']['tmp_name']) == 'video/x-msvideo'
                || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['pdf']['tmp_name']) == 'application/pdf')
        ) {


            if (!file_exists('upload/' . $_FILES['image']['name']) && !file_exists('upload/' . $_FILES['pdf']['name']) && !file_exists('upload/' . $_FILES['video']['name'])) {

                move_uploaded_file($_FILES['image']['tmp_name'], "upload/image/" . "image" . time() . "idUsers=" . "." . $extensionimage);//recup id user
                move_uploaded_file($_FILES['video']['tmp_name'], "upload/video/" . "video" . time() . "idUsers=" . "." . $extensionvideo);//recup id user
                move_uploaded_file($_FILES['pdf']['tmp_name'], "upload/pdf/" . "pdf" . time() . "idUsers=" . "." . $extensionpdf);//recup id user
                echo 'votre fichier a bien été uploadé merci ';
                $uploding = new uploding();
                $nouvarticle23 = new article();
                $res = $nouvarticle23->selectLastid();

                $res = $res['id'];

                $uploding->setNamefile("image" . time() . "idUsers=" . "." . $extensionimage);

                $uploding->Add($uploding, $res);

                $uploding->setNamefile("video" . time() . "idUsers=" . "." . $extensionvideo);

                $uploding->Add($uploding, $res);

                $uploding->setNamefile("pdf" . time() . "idUsers=" . "." . $extensionpdf);

                $uploding->Add($uploding, $res);

            } else {


                echo "<script>alert(' Un des fichiers    existe déjà.....');</script> ";
            }
        } else {


            echo "<script>alert('Erreur :  votre fichier ne respectes pas les régles d\' upload  . . ');</script> ";;
        }
        echo '<script language="JavaScript" type="text/javascript">window.location.replace("index_controller.php");</script>';
    }


}

?>

    <div class="ajoutarticle">
        <h1 id="hello,-world!">Ajouter un article</h1>


        <div class="form-post">

            <form action="ajoutearticle_controller.php" enctype="multipart/form-data" method="post" role="form">
                <div class="form-item">
                    <input type="text" id="titre" name="titre" required="required" placeholder="Titre">  </input>
                </div>
                <div id="sample">
                    <!--   <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
                       <script type="text/javascript">
                           //<![CDATA[
                           bkLib.onDomLoaded(function () {
                               nicEditors.allTextAreas()
                           });
                           //]]>
                       </script>-->
                    <textarea name="contenu" PLACEHOLDER="Votre article.."></textarea>
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
                <span class="upfile">


                    <label for="file">Pdf</label>
                    <input type='file' name='pdf' size='50' required="required"/>

                    <label for="file">Video</label>
                    <input type='file' name='video' size='50' required="required"/>


                    <label for="file">Image</label>
                    <input type='file' name='image' size='50' required="required"/></br>


                    <button type="submit" name="addpost">
                        <div class="glyphicon glyphicon-share-alt"></div>
                    </button>
                </span>
            </form>
        </div>
    </div>


<?php require 'includes/footer.php'; ?>