<?php

/**
 * Created by PhpStorm.
 * User: ADM3
 * Date: 10/05/2016
 * Time: 23:10
 */
class comments
{


    public function GetAllCommmentOfArticle($id)
    {


        require_once('../models/db.class.php');

        $pdo = new DB();

        error_reporting(E_ALL);
        ini_set("display_errors", 1);


        //$post_id value comes from the POSTS table
        $sql = ("SELECT * FROM comments c  INNER JOIN users u  ON u.id_user = c.id_user WHERE id_post =?");
        $row = $pdo->getBdd()->prepare($sql);
        $row->execute([$id]);


        return $result = $row->fetchAll(PDO::FETCH_OBJ);

    }


    public function AddCommmentOfArticle($comment_dis, $id)
    {


        require_once('../models/db.class.php');

        $pdo = new DB();

        $id_user = $_SESSION['session']['id'];

        $sql = ("INSERT INTO comments values ('',?,?, ?,NOW(),'')");


        $stmt = $pdo->getBdd()->prepare($sql);
        $stmt->execute([$id_user, $comment_dis, $id]);
    }
}