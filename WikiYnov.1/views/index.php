<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$activearticle = new article();


$activearticle = $activearticle->AdminSee();


?>
<div class="main">
    <div class="hipsum">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    </a>
                    <br/><br/>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Tout les projets - les grisés sont inactifs</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($activearticle as $data): ?>
                            <tr>
                                <th class="titre" scope="row"
                                    class='desactivation' <?php if ($data->active == false) echo "style='background-color: lightgrey'" ?> >
                                    <?php $extrait = substr($data->titre, 0, 60);
                                    echo "<a href='../controllers/projetreglage_controller.php?id={$data->id}' "; ?>
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
