<?php


if ($data->active != FALSE) {
    ?>
    <div class="col-md-offset-2 prec">
        <form action="../controllers/vu_controller.php">
            <button>
                <div class="glyphicon glyphicon-share-alt"></div>
            </button>
        </form>

    </div>
    <div class="post">
        <div>
            <h2><?php echo $data->titre; ?></h2>
        </div>
        <ul class="col-md-8 col-md-offset-2">
            <li><span class="fa fa-clock-o"></span> Article publié le <?php echo $data->date; ?>. Article posté
                par <?php echo ucfirst($data->prenom) . " " . strtoupper($data->nom); ?> dans la
                catégorie <?php echo $data->categorie; ?></li>
        </ul>
        <div class="col-md-8 col-md-offset-2">
            <img class="img-responsive" src="../controllers/upload/image/<?= $image->name; ?>" alt="imagepresenttion">
        </div>
        <p class="post-excerpt">


            <?php echo $data->contenu; ?>
        </p>


     <!--   <div class="row">
            <div class="col-md-7">
                <video controls class=left_vid>
                    <source src="../controllers/upload/video/<?= $video->name; ?>" type="video/mp4">
                    This browser does not display this video type
                </video>
            </div>

        </div>-->
        <div class="col-md-8 col-md-offset-2">

            <?php echo "<a    class='btn btn-warning button' href='../comment_system/comment.php?id={$data->id}' >Voir les commentaires</a>" ?>
        </div>
    </div>

    <?php
};

?>

<?php require "includes/footer.php";
