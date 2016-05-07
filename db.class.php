<?php

class DB
{

    private $db_name;
    private $db_host;
    private $db_user;
    private $db_password;
    public $pdo;

    public function __construct($db_name = 'wiki', $db_host = 'localhost', $db_user = 'root', $db_password = '')
    {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        try {
            $this->pdo = new PDO ('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . '', '' . $this->db_user . '', '' . $this->db_password . '');
        } catch (PDOException $e) {
            die('<h1>Impossible de se connecter a la base de donnee</h1>');
        }

    }

    public function getDB()
    {
        return $this->pdo;
    }

    public function requete($stmt, $data = array())
    {
        $req = $this->pdo->prepare($stmt);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function query($sql)
    {
        $req =$this->pdo->prepare($sql);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function insert($sql, $data = array())
    {
        $req = $this->pdo->prepare($sql);
        $req->execute($data);
        return $req;
    }

}