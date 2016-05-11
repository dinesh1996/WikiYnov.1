<?php

session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (!empty($_POST['comment']) && !empty($_POST['id'])) {


    $comment_dis = htmlentities($_POST['comment']);
    $post_id = htmlentities($_POST['id']);
    $id = $_POST['id'];

    require 'comment.class.php';
    $comentinsert = new comments();
    $result = $comentinsert->AddCommmentOfArticle($comment_dis, $id);
    ?>
    <li class="box">
        <span/><?= ucfirst($_SESSION['session']['prenom']) . ' ' . strtoupper($_SESSION['session']['nom']) ?></span><br>
        <span class="com_name"> <?= (!empty($comment_dis)) ? $comment_dis : ''; ?></span><br/><br/>
    </li>
    <?php


}

?>
