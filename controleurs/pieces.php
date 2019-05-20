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


        $capteurs=recuperercapteurs($bdd);
        $actionneurs=recupereractionneurs($bdd);
        if (!isset($_GET['maison']) || empty($_GET['maison'])) {
            $maison = 0;

        }else {
            $maison = $_GET['maison'];
        }

        $idmaison=idmaison($bdd,$_SESSION['idPersonne'],$maison);



        // puis ajouter une pièce

        // Cette partie du code est appelée si le formulaire AJOUTER UNE PIECE
        if (isset($_POST['nompiece'])) {

            if (!estUneChaine($_POST['nompiece'])) {
                $alerte = "Le nom de la pièce doit être une chaîne de caractère.";

            } else {

                $value = $_POST['nompiece'];

                // Appel à la BDD à travers une fonction du modèle.
                $retour = insertionpiece($bdd, $value, $idmaison['idHabitation']);

                if ($retour) {
                    $alerte = "L'ajout de la pièce a réussi";
                } else {
                    $alerte = "L'ajout de la piece n'a pas fonctionné";
                }
            }
        }






        if (is_int($idmaison)) { //si $idmaison est un entier, cela signifie qu'il y a eu un problème dans les données dans l'url
            $vue = "erreur404";

        } else {  //il n'y a pas de problème, on accède a la vue de la pièce
            $nombrecaptact=nbcaptact($bdd,$idmaison['idHabitation']);
            $vue = "pieces";
            $captact=[];
            $idpiece=recupererpieces($bdd,$idmaison['idHabitation']);


            // Cette partie du code est appelée si le formulaire SUPPRIMER UNE PIECE est rempli
            if (isset($_POST['numpiecesuppr'])) {

                if (!estUnEntier($_POST['numpiecesuppr'])) {
                    $alerte = "Le nom de la pièce doit être un entier.";

                } else {

                    $value = $_POST['numpiecesuppr'];

                    // Appel à la BDD à travers une fonction du modèle.
                    $alerte = supprimerpiece($bdd, $idpiece[$value]['idPiece']);
                    $idpiece=recupererpieces($bdd,$idmaison['idHabitation']);
                    $nombrecaptact=nbcaptact($bdd,$idmaison['idHabitation']);

                }
            }


            //si on a ajouté un capteur ou un actionneur
            if (isset($_POST['idcaptact']) and isset($_POST['numpiece'])){
                //   if (!is_int($_POST['idcaptact']) || !estUneChaine($_POST['numpiece'])) {
                //     $alerte = "l'id du capteur doit être une chaîne de caractère.";
                //} else {}
                $values = [
                    'idcaptact' => $_POST['idcaptact'],
                    'numpiece' => $_POST['numpiece']];
                $values['idpiece']=$idpiece[$values['numpiece']]['idPiece'];  //on récupère l'idpiece
                if (isset($_POST['numcemac']) and $nombrecaptact==0 ){   //cas ou numcemac est renseigné. le nombre
                    if (!estUneChaine($_POST['numcemac'])){              //de captact doit etre aussi nul et on ajoute le cemac dans la maison
                        $alerte="le numéro du cemac doit être une chaîne de caractères" ;
                    } else {
                        $numcemac=$_POST['numcemac'];
                        $alerte=ajoutercemac($bdd,$numcemac,$values['idpiece'],$values['idcaptact']);
                        $nombrecaptact=nbcaptact($bdd,$idmaison['idHabitation']);
                    }
                } elseif ($nombrecaptact=!0){   //cas ou il y a déjà des capteurs -> on connait le n°cemac
                    for($i=0 ; $i<count($idpiece) ; $i++){      //on récupère les captact pour avoir l'idCemac
                        $captact[$i]=recuperercapt($bdd,$idpiece[$i]['idPiece']);
                    }
                    $idcemac=$captact[0][0]['idCemac'];    //idcemac nécessaire a l'ajout d'un captact
                    $alerte=ajoutercaptact($bdd,$values['idpiece'],$values['idcaptact'],$idcemac,$idmaison['idHabitation']);

                } else {
                    $alerte="impossible de l'ajouter";
                }

            }

            //Si on veut supprimer un capteur ou un actionneur
            if (isset($_POST['typecaptactsuppr']) and isset($_POST['Numcaptactsuppr'])){
                if (!estUneChaine($_POST['typecaptactsuppr']) || !estUneChaine($_POST['Numcaptactsuppr'])) {
                    $alerte='le type ou le numéro du composant doivent être des chaînes de cractères';
                } else{
                    $alerte=supprimercaptact($bdd,$_POST['typecaptactsuppr'],$_POST['Numcaptactsuppr'],$idmaison['idHabitation']);
                }
            }




                for($i=0 ; $i<count($idpiece) ; $i++){              //on récupère les infos des captact
                $captact[$i]=recuperercapt($bdd,$idpiece[$i]['idPiece']);
            }
            $nombrecaptact=nbcaptact($bdd,$idmaison['idHabitation']);
            if($nombrecaptact>0){
                $numcemac=recuperernumcemac($bdd,$captact[0][0]['idCemac']);
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
