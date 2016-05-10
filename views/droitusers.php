<body>
<?php
$req = $user->seeUser();
foreach ($req as $utilisateur): ?>
    <?= ucfirst($utilisateur->prenom) . " " . strtoupper($utilisateur->nom) . " " . $utilisateur->rang; ?>
    <form method="post"><input name="id_user" value="<?= $utilisateur->id_user ?>" type="hidden">
        <select name="choixrang" id="">
            <option value="abonné" <?php if ($utilisateur->rang == 'abonné') echo ' selected disabled' ?>>abonné
            </option>
            <option value="admin" <?php if ($utilisateur->rang == 'admin') echo ' selected disabled' ?>>admin</option>
        </select>
        <button type="submit" name="rang">Changer rang</button>
    </form>
    <br>
<?php endforeach; ?>

</body>
</html>



