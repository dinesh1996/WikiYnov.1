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
    public function Ajouter($nouvarticle, $pdo)
    {


        $titre = strval($nouvarticle->getTitre());


        $auteur = strval($nouvarticle->getAuteur());
        
        $categorie = strval($nouvarticle->getCategorie());
        
        $contenu = strval($nouvarticle->getContenu());


        $auteur = addslashes($auteur);
        $categorie = addslashes($categorie);
        $titre = addslashes($titre);
        $contenu = addslashes($contenu);


        $sql = "INSERT INTO projets (titre, auteur, categorie, contenu, date) VALUES (' $titre','$auteur','$categorie', '$contenu', NOW())";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();


    }

    /**
     *
     */
    public function Vu()
    {
        // sql requete
    }


    /**
     *
     */
    public function Supprimer()
    {
        // sql requete
    }


    /**
     *
     */
    public function MiseAJour()
    {
        // sql requete
    }


}