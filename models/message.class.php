<?php

require 'db.class.php';

class message
{
    private $expediteur;
    private $destinataire;
    private $message;
    public $id_destin;
    public $DB;

    public function __construct($expediteur = null, $destinataire = null, $message = null, $id_destin = null)
    {
        $this->expediteur = $expediteur;
        $this->destinataire = $destinataire;
        $this->message = $message;
        $this->id_destin = $id_destin;
        $this->DB = new DB();
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
        $sql = "SELECT id_user FROM users WHERE login LIKE ?";
        $stmt = $this->DB->getBDD()->prepare($sql);
        $stmt->execute([$this->destinataire]);
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
 AND  m.id_desti = ? AND m.id_exped = ?) OR (u.id_user = m.id_desti AND m.id_desti = ? AND m.id_exped = ?)";
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
        $sql = "SELECT DISTINCT nom, prenom, id_exped FROM message m INNER JOIN users u ON u.id_user = m.id_exped AND m.id_desti = ? ";
        $stmt = $db->getBDD()->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetchALL(PDO::FETCH_OBJ);
        return $res;
    }
}
