<?php

include 'modele/requetes.catalogue.php';

if (empty($_POST['choix'])) { // si le bouton valider est appuyé alors ce champs n'est plus vide donc déclenche la suite

    $function = 'catalogue';
} else {
    $function = 'modifCatalogue';
}

switch ($function) {
    case 'catalogue':
        $vue = 'catalogue';
        $title = 'Déclaration d\'une panne';
        $catalogueCapteur = recupereTousCapteur($bdd);
        $catalogueActionneur = recupereTousActionneur($bdd);
        break;
    case 'modifCatalogue':

        header('Location: index.php?cible=catalogue&choix=catalogue');
        break;
}


include('vues/header.php');
include('vues/' . $vue . '.php');
include('vues/footer.php');