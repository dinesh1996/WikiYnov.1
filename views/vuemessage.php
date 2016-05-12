<div class="row">
    <div class="col-md-12">
        <div class="col-md-2">
            <?php
            foreach ($res as $contact): ?>
                <form action="" method="GET">
                    <input name="id_ex"
                           type="hidden"
                           value="<?php if ($contact->id_exped == $_SESSION['session']['id']) echo $contact->id_desti;
                           else echo $contact->id_exped ?>">
                    <button type="submit"
                            name="voir"><?= ucfirst($contact->prenom) . " " . strtoupper($contact->nom); ?></button>
                </form>

            <?php endforeach; ?>
        </div>
        <div class="col-md-3">

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
                    echo "<p style='color:red;'>" . $newmessage->contenu . "</p><br>";
                else echo $newmessage->contenu ?> <br><br>
                    <?php
                endforeach; ?>

                <form action="" method="post">
                    <input type="hidden" name="dest" value="<?php echo $exped ?>">
                    <textarea name="reponse" id="" cols="30" rows="3" placeholder="Réponse..."></textarea><br>
                    <button name="repondre">Repondre</button>
                </form>
            <?php }
            ?>
        </div>
        <form class="col-md-offset-3 col-md-3" method="post">
            <input type="text" name="dest" placeholder="destinataire">
            <textarea name="message" id="" cols="30" rows="10"></textarea>
            <button type="submit" name="envoi"> Envoyer</button>
        </form>
    </div>
</div>
<?php
require 'includes/footer.php'; ?>

