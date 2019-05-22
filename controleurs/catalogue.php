<?php

include 'modele/requetes.catalogue.php';

if (empty($_POST['choix'])) { // si le bouton valider est appuyé alors ce champs n'est plus vide donc déclenche la suite

    $function = 'catalogue';
}

switch ($function) {
    case 'catalogue':
        $vue = 'catalogue';
        $catalogueCapteur = recupereTousCapteur($bdd);
        $catalogueActionneur = recupereTousActionneur($bdd);
        break;

    case 'modifCatalogueCapteurs':
        if (isset($_POST['type']) and isset($_POST['unite']) and isset($_POST['champTYP']) ) {
            $values = [
                'type' => $_POST['type'],
                'unite' => $_POST['unite'],
                'champTYP' => $_POST['champTYP'],
                'CaptOuAct' => 1
            ];
            // Appel à la BDD à travers une fonction du modèle.
            $retour = ajouteCatalogue($bdd, $values);
        }
        var_dump($values);
        //header('Location: index.php?cible=catalogue&choix=catalogue');
        break;

        case 'modifCatalogueActionneur':
        if (isset($_POST['type']) and isset($_POST['unite']) and isset($_POST['champTYP']) ) {
            $values = [
                'type' => $_POST['type'],
                'unite' => $_POST['unite'],
                'champTYP' => $_POST['champTYP'],
                'CaptOuAct' => 2
            ];
            // Appel à la BDD à travers une fonction du modèle.
            $retour = ajouteCatalogue($bdd, $values);
        }
            header('Location: index.php?cible=catalogue&choix=catalogue');
            break;
}


include('vues/header.php');
include('vues/' . $vue . '.php');
include('vues/footer.php');