<?php


if ($data->active != FALSE) {
    ?>
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
            <p class="post-excerpt">
                <?php echo $data->contenu; ?>
            </p>
            <a class="btn btn-warning button" href="../controllers/vu_controller.php">Revenir à la liste d'article</a>
            <?php echo "<a    class='btn btn-warning button' href='../comment_system/comment.php?id={$data->id}' >Voir les commentaires</a>" ?>
        </div>
    </div>

    <?php
};

?>

<?php require "includes/footer.php";
