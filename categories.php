<?php

/**
 * Created by PhpStorm.
 * User: ADM3
 * Date: 06/05/2016
 * Time: 23:55
 */

class categories
{

    private $id;
    private $titre;
    private $date;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }



    public function AdminSeeSection()
    {
        require_once  'db.class.php';
        
        $pdo = new DB();


        $sql = "SELECT * FROM  categories ";
        $stmt = $pdo->getBdd()->prepare($sql);

        $stmt->execute();


        $result = $stmt->fetchAll(PDO::FETCH_OBJ);


        return $result;

    }



    public function AdminAddSection($nouvelcategorie)
    {



        require_once 'db.class.php';


        $pdo = new DB();

        $titre = $nouvelcategorie->getTitre();



        $sql = "INSERT INTO categories (titre, date) VALUES (?, NOW())";
        $stmt = $pdo->getBdd()->prepare($sql);
        $stmt->execute([$titre]);







    }

}