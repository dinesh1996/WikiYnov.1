<?php

//require 'db.class.php';

class message
{
    private $expediteur;
    private $destinataire;
    private $message;
    public $id_destin;
    private $destnom;
    private $destprenom;
    public $DB;

    public function __construct($expediteur = null, $message = null, $destnom = null, $destprenom = null, $destinataire = null, $id_destin = null)
    {
        $this->expediteur = $expediteur;
        $this->destinataire = $destinataire;
        $this->destnom = $destnom;
        $this->destprenom = $destprenom;
        $this->message = $message;
        $this->id_destin = $id_destin;
        $this->DB = new DB();
    }


    public function setIdDestin($id_destin)
    {
        $this->id_destin = $id_destin;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }


    public function insertMessage()
    {
        if ($this->verifDesti()) {
            $sql = "INSERT INTO message VALUES ('', ?, ? , ?)";
            $stmt = $this->DB->getBDD()->prepare($sql);
            $stmt->execute([$this->id_destin,
                $this->message,
                $this->expediteur]);
            //$this->DB->insert("INSERT INTO message VALUES ('', '$this->id_destin', '$this->message' , '$this->expediteur')");
            return true;
        }
    }

    public function insertMess()
    {
        $sql = "INSERT INTO message VALUES ('', ?, ? , ?)";
        $stmt = $this->DB->getBDD()->prepare($sql);
        $stmt->execute([$this->id_destin,
            $this->message,
            $this->expediteur]);
        // $this->DB->insert("INSERT INTO message VALUES ('', '$this->id_destin', '$this->message', '$this->expediteur')");
    }

    public function verifDesti()
    {
        $sql = "SELECT id_user FROM users WHERE prenom LIKE ? AND nom like ?";
        $stmt = $this->DB->getBDD()->prepare($sql);
        $stmt->execute([$this->destprenom, $this->destnom]);
        $res = $stmt->fetch(PDO::FETCH_OBJ);
        if ($res == true) {
            $this->id_destin = $res->id_user;
            return true;
        } else
            return false;
    }

    public function seeMessage($db, $exped)
    {
        $id = $_SESSION['session']['id'];
        $sql = "SELECT * FROM message m INNER JOIN users u ON (u.id_user = m.id_exped
 AND  m.id_desti = ? AND m.id_exped = ?) OR (u.id_user = m.id_desti AND m.id_desti = ? AND m.id_exped = ?)  ORDER BY m.id_message    ";
        $stmt = $db->getBDD()->prepare($sql);
        $stmt->execute([$id,
            $exped,
            $exped,
            $id]);
        $result = $stmt->fetchALL(PDO::FETCH_OBJ);
        return $result;
    }

    public function seeExped($db, $id)
    {
        $sql = "SELECT * FROM message m, users u
WHERE m.id_desti = u.id_user
OR m.id_exped = u.id_user
AND id_user = ?
GROUP BY id_user ";
        $stmt = $db->getBDD()->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetchALL(PDO::FETCH_OBJ);
        //var_dump($id);
        return $res;
    }
}
