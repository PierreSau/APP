<?php

// on récupère les requêtes génériques
include('requetes.generiques.php');

//on définit le nom de la table
$table = "users";

// requêtes spécifiques à la table des capteurs


/**
 * Recherche un utilisateur en fonction du nom passé en paramètre
 * @param PDO $bdd
 * @param string $nom
 * @return array
 */
function rechercheParNom(PDO $bdd, string $nom): array {
    
    $statement = $bdd->prepare('SELECT * FROM  users WHERE username = :username');
    $statement->bindParam(":username", $value);
    $statement->execute();
    
    return $statement->fetchAll();
    
}

/**
 * Récupère tous les enregistrements de la table users
 * @param PDO $bdd
 * @return array
 */
function recupereTousUtilisateurs(PDO $bdd): array {
    $query = 'SELECT * FROM personne';
    return $bdd->query($query)->fetchAll();
}
/**
 * Ajoute un nouvel utilisateur dans la base de données
 * @param array $utilisateur
 */
function ajouteUtilisateur(PDO $bdd, array $utilisateur) {

    $bdd->exec('INSERT INTO personne (nom, prenom, adresseMail, numDeTelephone, motDePasse, langue) VALUES ( \''.$utilisateur['nom'].'\', \''.$utilisateur['prenom'].'\', \''.$utilisateur['adresseMail'].'\', \''.$utilisateur['numDeTelephone'].'\',\''.$utilisateur['motDePasse'].'\',1)');
    return true;
}

function connexionUtilisateur(PDO $bdd, $mail)
{
    $req = $bdd->prepare('SELECT nom, prenom,adresseMail, numDeTelephone, motDePasse FROM personne WHERE adresseMail = \'' .$mail . '\'');
    $req->execute(array(
        'mail' => $mail));
    return $resultat = $req->fetch();
}

function editionProfil(PDO $bdd, array $edition)
{
    $bdd->exec('UPDATE personne SET nom = \''.$edition['nom'].'\', prenom = \''.$edition['prenom'].'\',adresseMail = \''.$edition['adresseMail'].'\', numDeTelephone = \''.$edition['numDeTelephone'].'\' WHERE adresseMail = \'' .$_SESSION['adresseMail'] . '\'');
    return true;
}

function editionSession(PDO $bdd,$mail){
    $req = $bdd->prepare('SELECT nom, prenom,adresseMail, numDeTelephone, motDePasse FROM personne WHERE adresseMail = \'' .$mail . '\'');
    $req->execute(array(
        'mail' => $mail));
    return $resultat = $req->fetch();
}
?>
