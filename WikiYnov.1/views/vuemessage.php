<div class="row messagerie">
    <div class="col-md-12">
        <div class="col-md-2 contact">
            <h2>Contact</h2>
            <?php
            foreach ($res as $contact): ?>
                <form action="" method="GET">
                    <input name="id_ex"
                           type="hidden"
                           value="<?php if ($contact->id_desti == $_SESSION['session']['id'])
                               echo $contact->id_exped;
                           else echo $contact->id_desti ?>">
                    <?php
                    if ($contact->prenom != $_SESSION['session']['prenom'] && $contact->nom != $_SESSION['session']['nom'])
                        if (isset ($_GET['id_ex']))
                            if ($_GET['id_ex'] == $contact->id_desti)
                                echo '<button class="active" type="submit"
                            name="voir">' . ucfirst($contact->prenom) . " " . strtoupper($contact->nom) . '</button>';
                            else
                                echo '<button type="submit"
                            name="voir">' . ucfirst($contact->prenom) . " " . strtoupper($contact->nom) . '</button>';
                        else
                            echo '<button type="submit"
                            name="voir">' . ucfirst($contact->prenom) . " " . strtoupper($contact->nom) . '</button>';
                    ?>
                </form>

            <?php endforeach; ?>
        </div>
        <div class="col-md-3 message">

            <?php if (isset($_GET['voir'])) {
                $exped = $_GET['id_ex'];
                $messa = new message();
                $result = $messa->seeMessage($db, $exped);
                ?>
                <?php
                foreach ($result as $newmessage):
                    $id_ex = $newmessage->id_exped;
                    ?>


                    <?php if ($id_ex == $id)
                    echo "<p class='exp'>" . ucfirst($newmessage->contenu) . "</p><br>";
                else echo '<p class="dest" >' . ucfirst($newmessage->contenu) ?> </p><br><br>
                    <?php
                endforeach; ?>

                <form action="" method="post">
                    <input type="hidden" name="dest" value="<?php echo $exped ?>">
                    <textarea name="reponse" id="" placeholder="Réponse..."></textarea><br>
                    <button name="repondre">
                        <div class="glyphicon glyphicon-share-alt"></div>
                    </button>
                </form>
            <?php }
            ?>
        </div>
        <div class="col-md-offset-3 col-md-3 nouvmess">
            <h2>Nouvelle conversation</h2>
            <form method="post">
                <input type="text" name="prenom" placeholder="Prenom">
                <input type="text" name="nom" placeholder="Nom">
                <textarea name="message" placeholder="Votre message..."></textarea>
                <button type="submit" name="envoi">
                    <div class="glyphicon glyphicon-envelope"></div>
                </button>
            </form>
        </div>
    </div>
</div>
<?php
require 'includes/footer.php'; ?>

