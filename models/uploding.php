<?php

/**
 * Created by PhpStorm.
 * User: ADM3
 * Date: 10/05/2016
 * Time: 00:13
 */
class uploding
{


    private $idUser;
    private $idNews;
    private $Namefile;
    private $date;
    private $User;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * @param mixed $User
     */
    public function setUser($User)
    {
        $this->User = $User;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getIdNews()
    {
        return $this->idNews;
    }

    /**
     * @param mixed $idNews
     */
    public function setIdNews($idNews)
    {
        $this->idNews = $idNews;
    }

    /**
     * @return mixed
     */
    public function getNamefile()
    {
        return $this->Namefile;
    }

    /**
     * @param mixed $Namefile
     */
    public function setNamefile($Namefile)
    {
        $this->Namefile = $Namefile;
    }


    public function Add($addfile)
    {

        require_once 'db.class.php';


        $pdo = new DB();

        $name = $addfile->getNamefile();





        $sql = "INSERT INTO uploadfile (name, date) VALUES ( ?, NOW())";
        $stmt = $pdo->getBdd()->prepare($sql);
        $stmt->execute([$name]);


    }
}