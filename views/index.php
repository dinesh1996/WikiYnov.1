<?php
/**
 * Created by PhpStorm.
 * User: ADM3
 * Date: 06/05/2016
 * Time: 20:10
 */


error_reporting(E_ALL);
ini_set("display_errors", 1);

$activearticle = new article();


$activearticle = $activearticle->AdminSee();


?>
<div class="main">
    <div class="hipsum">
        <div class="jumbotron">
            <h1 id="hello,-world!">Les articles</h1>
            <p>Via le tableau ci-dessous vous avez en un coup d'oeil tous les articles postés sur le site du plus récent
                article au plus vieux.</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="../controllers/ajoutearticle_controller.php">
                        <button type="button" class="btn btn-info" name="button"> Ajouter un
                            article
                        </button>
                    </a>
                    <a href="../views/ajoutercategories.php">
                        <button type="button" class="btn btn-info" name="button"> Ajouter
                            une catégorie
                        </button>
                    </a>
                    <br/><br/>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Tout les projets</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($activearticle as $data): ?>
                            <tr>
                                <th scope="row" class='desactivation'>
                                    <?php $extrait = substr($data->titre, 0, 60);
                                    echo "   <a href='../controllers/projetreglage_controller.php?id={$data->id}' "; ?>
                                    > <?= $extrait ?>
                                    </a>
                                </th>
                                <?php endforeach ?>
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
