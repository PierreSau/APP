<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 2019-03-25
 * Time: 11:30
 */

$alerte=false;
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

        } else {  //il n'y a pas de problème, on accède a la vue de la pièce
            $vue = "pieces";
            $captact=[];
            $idpiece=recupererpieces($bdd,$idmaison['idHabitation']);
            for($i=0 ; $i<count($idpiece) ; $i++){
                $captact[$i]=recuperercapt($bdd,$idpiece[$i]['idPiece']);
            }
        }
            break;

    case 'ajoutepiece':

        //même code que pour piece
        if (!isset($_GET['maison']) || empty($_GET['maison'])) {
            $maison = 0;

        }else {
            $maison = $_GET['maison'];
        }

        $idmaison=idmaison($bdd,$idutilisateur,$maison);




        // puis ajouter une pièce

        // Cette partie du code est appelée si le formulaire a été posté
        if (isset($_POST['nompiece'])) {

            if (!estUneChaine($_POST['nompiece'])) {
                $alerte = "Le nom de la pièce doit être une chaîne de caractère.";

            } else {

                $value = $_POST['nompiece'];

                // Appel à la BDD à travers une fonction du modèle.
                $retour = insertionpiece($bdd, $value, $idmaison['idHabitation']);

                if ($retour) {
                    $alerte = "Ajout réussi";
                } else {
                    $alerte = "L'ajout n'a pas fonctionné";
                }
            }
        }


        if (is_int($idmaison)) {
            $vue = "erreur404";

        } else {  //il n'y a pas de problème, on accède a la vue de la pièce
            $vue = "pieces";
            $captact=[];
            $idpiece=recupererpieces($bdd,$idmaison['idHabitation']);
            for($i=0 ; $i<count($idpiece) ; $i++){
                $captact[$i]=recuperercapt($bdd,$idpiece[$i]['idPiece']);
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
