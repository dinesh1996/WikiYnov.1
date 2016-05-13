<div id="droitusers">
    <?php
    $req = $user->seeUser();
    foreach ($req as $utilisateur): ?>
        <?= '<div class="col-md-offset-2 col-md-5">' . ucfirst($utilisateur->prenom) . " " . strtoupper($utilisateur->nom) . "</div>"; ?>
        <form method="post"><input name="id_user" value="<?= $utilisateur->id_user ?>" type="hidden">
            <select name="choixrang" id="">
                <option value="abonné" <?php if ($utilisateur->rang == 'abonné') echo ' selected disabled' ?>>Abonné
                </option>
                <option value="admin" <?php if ($utilisateur->rang == 'admin') echo ' selected disabled' ?>>Admin
                </option>
                <option value="auteur" <?php if ($utilisateur->rang == 'auteur') echo ' selected disabled' ?>>Auteur
                </option>
            </select>
            <button type="submit" name="rang">Changer rang</button>
        </form>
        <br>
    <?php endforeach; ?>
</div>


<?php require 'includes/footer.php'; ?>

