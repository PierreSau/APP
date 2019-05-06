<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 2019-03-25
 * Time: 11:30
 */


/**
 * Contrôleur de la pièce
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('modele/connexion.php');
include('modele/maison.php');
include('modele/requetes.pieces.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil des pieces
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "pieces";
} else {
    $function = $_GET['fonction'];
}

switch ($function) {

    case 'pieces':
        if (!isset($_GET['maison']) || empty($_GET['maison'])) {
            $maison = 0;

        }else {
            $maison = $_GET['maison'];
        }

        $idmaison=idmaison($bdd,$idutilisateur,$maison);
        if (is_int($idmaison)) {
            $vue = "erreur404";

        } else {
            $vue = "pieces";
        }
            break;

    case 'ajout':
        //ajouter une pièce

        $title = "ajouter une pièce";
        $vue = "piece";
        $alerte = false;

        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['name']) and isset($_POST['type'])) {

            if (!estUneChaine($_POST['name'])) {
                $alerte = "Le nom de la pièce doit être une chaîne de caractère.";

            } else if (!estUneChaine($_POST['type'])) {
                $alerte = "Le type du capteur doit être une chaîne de caractère.";

            } else {

                $values = [
                    'name' => $_POST['name'],
                    'type' => $_POST['type']
                ];

                // Appel à la BDD à travers une fonction du modèle.
                $retour = insertion($bdd, $values, $table);

                if ($retour) {
                    $alerte = "Ajout réussie";
                } else {
                    $alerte = "L'ajout dans la BDD n'a pas fonctionné";
                }
            }
        }


        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('vues/header.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');
