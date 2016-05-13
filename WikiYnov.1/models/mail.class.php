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


    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setDesinataire($desinataire)
    {
        $this->destinataire = $desinataire;
    }

    public function setSujet($sujet)
    {
        $this->sujet = $sujet;
    }

    public function send()
    {
        mail($this->destinataire, $this->sujet, $this->message, $this->entete);
    }

    public function mailIns($destinataire, $cle, $prenom, $nom)
    {
        $this->message =
            '<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
   </header>
<body>
<p>Bienvenue sur le site de toto,</p>
</br>
</br>
<p>Pour confirmer la création de votre compte veuillez cliquer sur le lien ci dessous.</p>
</br>
</br>

<a href="http://localhost/WikiYnov.1/activation.php?prenom=' . $prenom . '&nom=' . $nom . '&cle=' . $cle . '">Cliquez ici pour activer votre compte!</a><br>

<p>Votre login est :  ' . $prenom . '.' . $nom . '</p><br>
<p>Votre mot de passe à déjà été défini à l\'inscription mais vous pouvez à tous moment le changer.</p>

<p>--------------------------------------------------------------------</p>
<p>Ceci est un mail automatique, Merci de ne pas y répondre.</p>

</body>
</html>';

        $this->sujet = 'Confirmation d\'inscription';
        $this->destinataire = $destinataire;
        $this->send();
        echo '<script>alert("Pour activé votre compte veuillez consulter vos mails.")</script>';
    }

    public function mailForget($cle)
    {
        $this->message =
            '<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8">
   </header>
<body>
<p>Bonjour,</p>
</br>
</br>
<p>Pour changer votre mot de passe, veuillez cliquer sur le lien suivant.</p>
</br>
</br>

<a href="http://localhost/WikiYnov.1/modif.php?cle=' . $cle . '">Cliquez ici pour modifier votre mot de passe</a><br>


<p>--------------------------------------------------------------------</p>
<p>Ceci est un mail automatique, Merci de ne pas y répondre.</p>

</body>
</html>';

        $this->sujet = 'Oublie de mot de passe';
        $this->send();
        echo '<script>alert("Un mail de réinitialisation vous a été envoyé.")</script>';
    }


}