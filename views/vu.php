<div class="vu">
    <div>
        <h2 class="title">Les articles publiés</h2>
    </div>


    <div>


        <form action="vu_controller.php" method="GET" role="form">


            <label for="categorie">Choisissez une catégorie</label>
            <select id="categorie" name="categorie">
                <?php foreach ($categoriechoix as $data): ?>
                    <option value="<?php echo $data->titre; ?>"><?php echo $data->titre; ?></option>
                <?php endforeach; ?>
            </select>


            <button type="submit" name="choix">
                <div class="glyphicon glyphicon-search"></div>


        </form>


    </div>


</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3 post">
        <?php


        foreach ($resultat as $data): ?>
            <div>
                <h2>
                    <?php echo "<a href='../controllers/vuprojet_controller.php?id={$data->id}' > {$data->titre} </a>" ?>
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
                    echo " '$extrait' <a href='../controllers/vuprojet_controller.php?id={$data->id}' "; ?> >...Lire
                    la suite</a>
                </p>
            </div>
            <div>
                <ul>
                    <li>Article posté par <?php echo ucfirst($data->prenom) . " " . strtoupper($data->nom); ?> dans
                        la
                        catégorie <?php echo $data->categorie; ?></li>
                </ul>
            </div>
        <?php endforeach; ?></div>
</div>
</div>
<?php require "includes/footer.php";

