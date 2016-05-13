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
    <div class="reglage">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">


                    <a href="index_controller.php">
                        <div class="prec">
                            <button type="submit" name="button">
                                <div class="glyphicon glyphicon-share-alt"></div>
                            </button>
                        </div>
                    </a>

                    <br/><br/>


                    <div class="r">


                        <h1><?= $activearticle->titre; ?></h1>
                        <p><?= ucfirst($activearticle->contenu) ?></p>

                        <p> L' auteur
                            : <?= ucfirst($activearticle->prenom) . " " . strtoupper($activearticle->nom); ?></p>
                        <p> Dernière mise à jour : <?= $date; ?></p>
                        <p> Dans la catégorie : <?= $activearticle->categorie; ?></p>

                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>

                            <td>


                                <a href="#0">
                                    <button name="button" class=" btn btn-info onoff">Statu</button>
                                </a>


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
                                        <a href="#0" class="cd-popup-close img-replace"></a>
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


<?php require 'includes/footer.php'; ?>