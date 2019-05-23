<?php

/**
 * Le contrôleur :
 * - définit le contenu des variables à afficher
 * - identifie et appelle la vue
 */

/**
 * Contrôleur de l'utilisateur
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('modele/requetes.utilisateurs.php');
include('modele/requetes.catalogue.php');


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = $_GET['fonction'];
}

switch ($function) {

    case 'accueil':
        //affichage de l'accueil
        $vue = "accueil";
        $title = "Accueil";

        $alerte = false;
        // Cette partie du code est appelée si le formulaire a été posté
        $alerte = 'test';
        if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['adresseMail']) and isset($_POST['numDeTelephone']) and isset($_POST['motDePasse'])) {
            if (!estUneChaine($_POST['nom']) || !estUneChaine($_POST['prenom'])) {
                $alerte = "Le nom d'utilisateur doit être une chaîne de caractère.";
            } else if (!estUnMotDePasse($_POST['motDePasse'])) {
                $alerte = "Le mot de passe n'est pas correct.";
            } else if (!estUnEntier($_POST['numDeTelephone'])) {
                $alerte = "Ce n'est pas un numéro de téléphone";
            } else {
                // Tout est ok, on peut inscrire le nouvel utilisateur
                //
                $values = [
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'adresseMail' => $_POST['adresseMail'],
                    'numDeTelephone' => $_POST['numDeTelephone'],
                    'motDePasse' => crypterMdp($_POST['motDePasse']) // on crypte le mot de passe
                ];
                // Appel à la BDD à travers une fonction du modèle.
                $retour = ajouteUtilisateur($bdd, $values);
                if ($retour) {
                    $alerte = "Inscription réussie";

                } else {
                    $alerte = "L'inscription dans la BDD n'a pas fonctionné";
                }
            }
        }

        if (isset($_POST['adresseMail2']) and isset($_POST['motDePasse2'])) {

            $values = $_POST['adresseMail2'];
            $resultat = connexionUtilisateur($bdd, $values);
            $isPasswordCorrect = password_verify($_POST['motDePasse2'], $resultat['motDePasse']);

            if (!$resultat) {
                echo 'Mauvais identifiant ou mot de passe !';
            } else {
                if ($isPasswordCorrect) {
                    $_SESSION['idPersonne'] = $resultat['idPersonne'];
                    $_SESSION['nom'] = $resultat['nom'];
                    $_SESSION['prenom'] = $resultat['prenom'];
                    $_SESSION['adresseMail'] = $resultat['adresseMail'];
                    $_SESSION['numDeTelephone'] = $resultat['numDeTelephone'];
                    $_SESSION['niveau'] = $resultat['niveau'];

                    echo 'Vous êtes connecté !';
                } else {
                    echo 'Mauvais mot de passe !';
                }
            }
        }
        break;

    case 'deconnexion':
        $vue = 'deconnexion';
        session_destroy();
        header('Location: index.php');
        break;

    case 'editionProfil':
        if (isset($_SESSION['adresseMail'])) {
            $vue = 'editionProfil';
            if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['adresseMail']) and isset($_POST['numDeTelephone'])) {
                if (!estUneChaine($_POST['nom']) || !estUneChaine($_POST['prenom'])) {
                    $alerte = "Le nom d'utilisateur doit être une chaîne de caractère.";
                } else if (!estUnEntier($_POST['numDeTelephone'])) {
                    $alerte = "Ce n'est pas un numéro de téléphone";
                } else {
                    // Tout est ok, on peut inscrire le nouvel utilisateur
                    //
                    $values = [
                        'nom' => $_POST['nom'],
                        'prenom' => $_POST['prenom'],
                        'adresseMail' => $_POST['adresseMail'],
                        'numDeTelephone' => $_POST['numDeTelephone']];
                    $retour = editionProfil($bdd, $values);
                    if ($retour) {
                        $alerte = "Inscription réussie";
                        $resultat = editionSession($bdd, $_POST['adresseMail']);
                        $_SESSION['nom'] = $resultat['nom'];
                        $_SESSION['prenom'] = $resultat['prenom'];
                        $_SESSION['adresseMail'] = $resultat['adresseMail'];
                        $_SESSION['numDeTelephone'] = $resultat['numDeTelephone'];
                    } else {
                        $alerte = "L'inscription dans la BDD n'a pas fonctionné";
                    }
                }
            } else {
                echo 'Un champ est vide';
            }
        } else {
            $vue = 'erreur404';
        }
        break;

    case 'liste':
        // Liste des utilisateurs déjà enregistrés
        $vue = "liste";
        $title = "Liste des utilisateurs inscrits";
        $entete = "Voici la liste :";

        $liste = recupereTousUtilisateurs($bdd);

        if (empty($liste)) {

            $alerte = "Aucun utilisateur inscrit pour le moment";
        }

        break;

    case 'modifListe':
        editionNiveau($bdd, $_POST['choix'], $_GET['idPersonne']);
        header('Location: index.php?cible=utilisateurs&fonction=liste');
        break;

    case 'mode':
        $vue = "Modefct";
        break;

    case 'maison':
        if (isset($_SESSION['adresseMail'])) {
            $vue = "maison";
            include('modele/maison.php');
            include('modele/connexion.php');
            if (isset($_POST['nommaison'])) {
                if (!estUneChaine($_POST['nommaison'])) {
                    $alerte = "L'adresse de la maison doit être une chaîne de caractère.";
                } else {
                    $value = $_POST['nommaison'];
                    ajoutermaison($bdd, $_SESSION['idPersonne'], $value, 1);
                    $alerte = 'ajout réussi';
                }

            }
            if (isset($_POST['maisonsuppr'])) {
                if (!estUnEntier($_POST['maisonsuppr'])) {
                    $alerte = "Le numéro de la maison doit être un entier";
                } else {
                    $value = $_POST['maisonsuppr'];
                    $alerte = supprimermaison($bdd, $value, $_SESSION['idPersonne']);
                }
            }


            $maisons = recupereradresse($bdd, $_SESSION['idPersonne']);

        } else {
            $vue = 'erreur404';
        }
        break;

    case 'faq':
        $vue = 'faq';
        include('modele/requetes.faq.php');
        $faq = recupererFAQ();
        break;

    case 'stat':
        $vue = 'stat';
        include('modele/requetes.stat.php');
        $ArrayPiece = recupPiece($bdd);
        $ArrayConso = array();

        foreach ($ArrayPiece as $piece) {
            $ArrayConso[] = calculConsoPiece($bdd, $piece[0]);
        }
        break;

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

        header('Location: index.php?cible=utilisateurs&fonction=catalogue');
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
        header('Location: index.php?cible=utilisateurs&fonction=catalogue');
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/header.php');
include('vues/' . $vue . '.php');
include('vues/footer.php');
