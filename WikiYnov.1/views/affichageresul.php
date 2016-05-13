<div class="posts-box posts-box-6">
    <div>
        <h2 class="title">Votre rechercher</h2>
    </div>


</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3 post">
        <?php
        foreach ($resultat as $data): ?>
            <div>
                <h2>
                    <?php echo "<a href='vuprojet_controller.php?id={$data->id}' > {$data->titre} </a>" ?>
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
                    echo " '$extrait' <a href='vuprojet_controller.php?id={$data->id}' "; ?> >...Lire la suite</a>
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


<?php require 'includes/footer.php';
