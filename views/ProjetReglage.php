<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$activearticle = new article();
$getid = $_GET['id'];
$activearticle = $activearticle->SeeOneProject($getid);

if ($activearticle->last_update === NULL) {

    $date = $activearticle->date;
} else $date = $activearticle->last_update;


?>


    <!-- Content -->
    <div class="main">
        <div class="hipsum">
            <div class="jumbotron">
                <h1 id="hello,-world!">Les articles</h1>
                <p>Via le tableau ci-dessous vous avez en un coup d'oeil tous les articles postés sur le site du plus
                    récent
                    article au plus vieux.</p>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="AjouteArticle.php">
                            <button type="button" class="btn btn-info" name="button"> Ajouter un
                                article
                            </button>
                        </a>


                        <a href="ajoutercatégories.php">
                            <button type="button" class="btn btn-info" name="button"> Ajouter
                                une catégorie
                            </button>
                        </a>


                        <a href="index.php">
                            <button type="button" class="btn btn-info" name="button"> Revenir à la liste
                                des porjets
                            </button>
                        </a>

                        <br/><br/>


                        <div class="r">


                            <h1><?= $activearticle->titre; ?></h1>


                            <p> L' auteur : <?= ucfirst($activearticle->prenom). " ". strtoupper($activearticle->nom); ?></p>
                            <p> Dernière mise à jour : <?= $date; ?></p>
                            <p> Dans la catégorie : <?= $activearticle->categorie; ?></p>

                        </div>


                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>


                                    <th>Actions</th>
                                    <th>Activation</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>

                                    <!-- boutton modifier -->
                                    <td>


                                        <a href='modif.php?id=<?= $activearticle->id ?>'>
                                            <button class="btn btn-info" name="button">Modifer
                                            </button>
                                        </a>

                                    </td>


                                    <td>


                                        <a href="#0">
                                            <button name="button" class=" btn btn-info onoff">Activation</button>
                                        </a>
                                    </td>


                                    <div class="cd-popup" role="alert">
                                        <div class="cd-popup-container">
                                            <p>Voulez-vous ?</p>
                                            <ul class="cd-buttons" style="padding-left: 0em;">
                                                <li>


                                                    <a href="../views/activation.php?id=<?= $activearticle->id ?>&activation=0">Activation</a>
                                                </li>
                                                <li>
                                                    <a href="../views/activation.php?id=<?= $activearticle->id ?>&activation=1">Desactivation</a>
                                                </li>
                                            </ul>
                                            <a href="#0" class="cd-popup-close img-replace">Close</a>
                                        </div> <!-- cd-popup-container -->
                                    </div> <!-- cd-popup --></td>

                                </tr>

                                </tbody>
                            </table>
                        </div><!--end of .table-responsive-->
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require 'includes/footer.php'; ?>