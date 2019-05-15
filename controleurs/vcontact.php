
<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 2019-03-19
 * Time: 14:46
 */

// on inclut le fichier modèle contenant les appels à la BDD
include('modele/requetes.contact.php');
$vue='vcontact';

// define variables and set to empty values
$nameErr = $emailErr = $propErr = $utiliseErr = "";
$name = $email = $prop = $comments = $utilise = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "email non fourni";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "email invalide";
        }
    }

    if (empty($_POST["utilise"])) {
        $utilise = "";
    } else {
        $utilise= test_input($_POST["utilise"]);

    }

    if (empty($_POST["comments"])) {
        $comments = "";
    } else {
        $comments = test_input($_POST["comments"]);
    }

    if (empty($_POST["prop"])) {
        $propErrErr = "indiquer si vous etes le proprietaire";
    } else {
        $prop = test_input($_POST["prop"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// Variables concernant l'email
$destinataire = 'contactservice.ecom@gmail.com'; // Adresse email du webmaster
$sujet = $utilise; // Titre de l'email
$contenu = '<html><head><title>CONTACT</title></head><body>';
$contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web.</p>';
$contenu .= '<p><strong>Nom</strong>: '.$name.'</p>';
$contenu .= '<p><strong>Email</strong>: '.$email.'</p>';
$contenu .= '<p><strong>Message</strong>: '.$comments.'</p>';
$contenu .= '</body>Veuillez lui repondre dans les plus brefs delais</html>'; // Contenu du message de l'email


// Pour envoyer un email HTML, l'en-tête Content-type doit être défini
$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

@mail($destinataire, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email

include ('vues/header.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');


