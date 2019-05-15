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
        break;


    case 'inscription':
        $vue = "inscription";
        $alerte = false;
        // Cette partie du code est appelée si le formulaire a été posté
        $alerte='test';
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
                    'numDeTelephone'=> $_POST['numDeTelephone'],
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
        $title = "Inscription";
        break;

    case 'connexion' :
        $vue = "connexion";


        if (isset($_POST['adresseMail']) and isset($_POST['motDePasse'])) {

        $values = $_POST['adresseMail'];
        $resultat = connexionUtilisateur($bdd,$values);
        $isPasswordCorrect = password_verify($_POST['motDePasse'], $resultat['motDePasse']);

        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['adresseMail'] = $resultat['adresseMail'];
                echo 'Vous êtes connecté !';
            }
            else {
                echo 'Mauvais mot de passe !';
            }
        }}
        break;
        
    case 'liste':
    // Liste des utilisateurs déjà enregistrés
        $vue = "liste";
        $title = "Liste des utilisateurs inscrits";
        $entete = "Voici la liste :";
        
        $liste = recupereTousUtilisateurs($bdd);
        
        if(empty($liste)) {
            $alerte = "Aucun utilisateur inscrit pour le moment";
        }
        
        break;

    case 'mode':
        $vue = "Modefct";
        break;

    case 'maison':
        $vue = "maison";
        break;

    case 'AccueilPanne':
        $vue = 'panne';
        $title = 'Déclaration d\'une panne';
        break;


    case 'ValidationChoix':
        $vue = 'panne2';
        $title = 'Problème déclaré';
        //ajoutePanne($bdd, $_POST['fonction']);
        //Parametrage de l'envoi du mail de confirmation
        $header = "MIME-Version: 1.0" . "\n";
        $header .= 'From:"SAV EcoM"<ConcactService.EcoM@gmail.com>' . "\n";
        $header .= "Reply-to: \"EcoM\" <ConcactService.EcoM@gmail.com>" . "\n";
        $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
        $header .= 'Content-Transfer-Encoding: 8bit';

        $message = "";
        $mail = recupererEmail($bdd);

        $Objet = 'EcoM: Déclaration reçue';
        // ça marche pas avec cette ligne su coup je la met en comm
        //mail($mail, $Objet, $message, $header);
        switch($_POST['fonction']) {
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
        }
        break;
        
     case 'faq':
        $vue='faq';
        include('modele/requetes.faq.php');
        include('modele/connexion.php');
        $faq=recupererFAQ();
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
