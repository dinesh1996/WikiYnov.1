<?php

/**
 * Created by PhpStorm.
 * User: ADM3
 * Date: 04/05/2016
 * Time: 09:54
 */
class article

{


    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $titre;
    /**
     * @var
     */
    private $contenu;
    /**
     * @var
     */
    private $auteur;
    /**
     * @var
     */
    private $date;

    /**
     * @return mixed
     */

    private $categorie;

    public $pdo;

    /**
     * @return mixed
     */

    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }


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
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
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


    /**
     *
     */
    public function Add($nouvarticle)
    {

        require_once 'db.class.php';


        $pdo = new DB();

        $titre = $nouvarticle->getTitre();


        //$auteur = $nouvarticle->getAuteur();
        $auteur = 1;

        $categorie = $nouvarticle->getCategorie();
        // $categorie = 1;

        $contenu = $nouvarticle->getContenu();


        $sql = "INSERT INTO projets (titre, auteur, categorie, contenu, date) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $pdo->getBdd()->prepare($sql);
        $stmt->execute([$titre, $auteur, $categorie, $contenu]);


    }

    /**
     *
     */
    public function See()
    {

        require_once 'db.class.php';
        $pdo = new DB();


        $sql = "SELECT * FROM  projets  WHERE active= ?";
        $stmt = $pdo->getBdd()->prepare($sql);

        $stmt->execute([true]);


        $result = $stmt->fetchAll(PDO::FETCH_OBJ);


        return $result;

    }


    public function AdminSee()
    {

        require_once 'db.class.php';
        $pdo = new DB();


        $sql = "SELECT * FROM  projets ";
        $stmt = $pdo->getBdd()->prepare($sql);

        $stmt->execute([]);


        $result = $stmt->fetchAll(PDO::FETCH_OBJ);


        return $result;

    }


    public function SeeOneProject($id)
    {

        require_once 'db.class.php';
        $pdo = new DB();

        $sqlv = "SELECT * FROM projets WHERE id LIKE ? ";
        $req = $pdo->getBdd()->prepare($sqlv);
        $req->execute([$id]);
        $resultat = $req->fetch(PDO::FETCH_OBJ);
        return $resultat;
    }


    /**
     *
     */
    public function Delate($id)
    {


        require_once 'db.class.php';
        $pdo = new DB();


        $sql = "UPDATE projets SET active=?  WHERE id= ?";
        $stmt = $pdo->getBdd()->prepare($sql);
        $stmt->execute([FALSE, $id]);


    }

    public function Activation($id)
    {


        require_once 'db.class.php';
        $pdo = new DB();


        $sql = "UPDATE projets SET active=?  WHERE id= ?";
        $stmt = $pdo->getBdd()->prepare($sql);

        $stmt->execute([TRUE, $id]);


    }


    /**
     *
     */
    public function PrepareUpdate()


    {
        require_once 'db.class.php';
        $pdo = new DB();
        $sql = "SELECT * FROM projets WHERE id=?";
        $stmt = $pdo->getBDD()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        $amodif = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $amodif;
    }


    public function Update($articleAmodif)
    {
        require_once 'db.class.php';
        $pdo = new DB();

        $id = $_GET['id'];
        $titre = $articleAmodif->getTitre();


        //$auteur = $nouvarticle->getAuteur();
        $auteur = 1;

        $categorie = $articleAmodif->getCategorie();

        $time = date("Y-m-d H:i:s");
        $contenu = $articleAmodif->getContenu();
        var_dump($id, $time);


        $sql = ("UPDATE projets  SET  titre=?, auteur=?, categorie=?, contenu=?,last_update=? WHERE  id=$id");
        $stmt = $pdo->getBdd()->prepare($sql);
        $stmt->execute([$titre, $auteur, $categorie, $contenu, $time]);


    }
}