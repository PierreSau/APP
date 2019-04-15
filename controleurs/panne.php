<?php

include 'modele/panne.php';

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = $_GET['fonction'];
}


switch ($function){
    case 'AccueilPanne':
        $vue = 'panne';
        $title = 'Déclaration d\'une panne';
        break;


    case 'validationpanne':
        if (empty($_POST['choix'])){
            $function='AccueilPanne';
            $vue = 'panne';
        }else {
            $vue = 'panne2';
            $title = 'Problème déclaré';
            ajoutePanne($bdd, $_POST['choix']);
            //Parametrage de l'envoi du mail de confirmation
            $header = "MIME-Version: 1.0" . "\n";
            $header .= 'From:"SAV EcoM"<ConcactService.EcoM@gmail.com>' . "\n";
            $header .= "Reply-to: \"EcoM\" <ConcactService.EcoM@gmail.com>" . "\n";
            $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
            $header .= 'Content-Transfer-Encoding: 8bit';

            $message = "lol";
            $mail = recupererEmail($bdd);

            $Objet = 'EcoM: Déclaration reçue';
            // ça marche pas avec cette ligne su coup je la met en comm
            mail($mail, $Objet, $message, $header);
            switch ($_POST['choix']) {
                case 'pbCapteur':
                    $choixType = 'un capteur';
                    break;
                case 'pbCemac':
                    $choixType = 'un Cemac';
                    break;
                case 'valAbs':
                    $choixType = 'des valeurs absurdes relevées';
                    break;
                case 'autre':
                    $choixType = 'un problème non notifié';
                    break;
            }
        }
    break;
}

include('vues/header.php');
include('vues/' . $vue . '.php');
include('vues/footer.php');







