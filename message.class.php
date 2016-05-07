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
        $this->DB = new DB;
    }

    public function insertMessage()
    {
        if ($this->verifDesti()) {
            $this->DB->insert("INSERT INTO message VALUES ('', '$this->id_destin', '$this->message' , '$this->expediteur')");
            return true;
        }
    }

    public function verifDesti()
    {
        $res = $this->DB->query("SELECT id_user FROM users WHERE login LIKE '$this->destinataire'");
        if ($res->id_user != 0) {
            $this->id_destin = $res->id_user;
            return true;
        }
    }

}
