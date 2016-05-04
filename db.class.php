<?php

class DB extends PDO
{

    private $host = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $database = 'wiki-ynov';
    private $db;

    public function __construct($host = null, $username = null, $password = null, $database = null)
    {
        if ($host != null) {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username,
                $this->password, array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                ));
        } catch (PDOException $e) {
            die('<h1>connection à la basse de donnée impossible</h1>');
        }
    }

    public function getBdd()
    {
        return $this->db;
    }


    public function query($sql)
    {
        $req = $this->db->prepare($sql);
        $req->execute([]);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    /* public function query($sql, $data = array())
         {
             $req = $this->db->prepare($sql);
             $req->execute($data);
             return $req->fetchAll(PDO::FETCH_OBJ);
         }

         public function requete($sql)
         {
             $req = $this->db->prepare($sql);
             $req->execute();
             return $req->fetch(PDO::FETCH_OBJ);
         }
   */
}
