<?php

class mail
{

    public $destinataire;
    public $sujet;
    public $entete;
    public $message;

    public function __construct($destinataire = null, $sujet = null, $message = null)
    {
        $this->destinataire = $destinataire;
        $this->sujet = $sujet;
        $this->message = $message;
        $this->entete = 'MIME-Version: 1.0' . "\r\n";
        $this->entete .= 'From: thomas.valadier.2@gmail.com' . "\n";
        $this->entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $this->entete .= 'Content-Transfer-Encoding: 8bit';
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }



}