<?php session_start();
if (isset($_SESSION)) {

    if ($_SESSION['session']['rang'] == "admin")
        require "../controllers/header_controller.php";
} else
    require "../controllers/accueil_controller.php";

?>
<div id="main">


    <ol id="update" class="timeline">

        <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        require 'comment.class.php';
        $coment = new comments();
        $id = $_GET['id'];
        $result = $coment->GetAllCommmentOfArticle($id);

        // var_dump($_GET['id']);
        foreach ($result as $data): ?>


            <li class="box">

                <span class="com_name"> <?= ucfirst($data->prenom) . ' ' . strtoupper($data->nom); ?></span> <br/>

                <span class="com_name"> <?= $data->comment; ?></span> <br/>


            </li>

        <?php endforeach; ?>

    </ol>
    <div id="flash" align="left"></div>

    <div style="margin-left:100px">
        <form action="#" method="POST" id="comment">
            <input type="hidden" name="post_id" id="post_id"
                   value="<?= (!empty($post_id)) ? $post_id : ''; ?>"  </input>


            <input type="hidden" name="id" id="id" value="<?= $_GET['id'] ?>">


            <textarea name="comment" id="comment"></textarea><br/>
            <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
            <input type="submit" class="submit" value=" Submit Comment "/>
        </form>
    </div>


</div>


<script src="https://code.jquery.com/jquery-1.12.3.min.js"
        integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
<script src="app.js"></script>


</body>
</html>