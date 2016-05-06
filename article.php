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
    public function Ajouter($nouvarticle)
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
    public function Vu()
    {

        require_once 'db.class.php';
        $pdo = new DB();


        $sql = "SELECT * FROM  projets  WHERE active= ?";
        $stmt = $pdo->getBdd()->prepare($sql);

        $stmt->execute([true]);


        $result = $stmt->fetchAll(PDO::FETCH_OBJ);


        return $result;

    }


    public function AdminVu()
    {

        require_once 'db.class.php';
        $pdo = new DB();


        $sql = "SELECT * FROM  projets ";
        $stmt = $pdo->getBdd()->prepare($sql);

        $stmt->execute([]);


        $result = $stmt->fetchAll(PDO::FETCH_OBJ);


        return $result;

    }


    public function Vuprojet($id)
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
    public function Supprimer($id)
    {


        require_once 'db.class.php';
        $pdo = new DB();


        $sql = "UPDATE projets SET active=?  WHERE id= ?";
        $stmt = $pdo->getBdd()->prepare($sql);

        $resultat = $stmt->execute([FALSE, $id]);


        return $resultat;


    }


    /**
     *
     */
    public function MiseAJour()
    {
        require_once 'db.class.php';
        $pdo = new DB();


       
    
            $amodif = $pdo->query("SELECT * FROM projets WHERE id={$_GET['id']}");
            return $amodif;

        

    }
}