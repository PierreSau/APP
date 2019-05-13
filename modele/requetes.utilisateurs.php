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
    $query = 'SELECT * FROM users';
    return $bdd->query($query)->fetchAll();
}

/**
 * Ajoute un nouvel utilisateur dans la base de données
 * @param array $utilisateur
 */
function ajouteUtilisateur(PDO $bdd, array $utilisateur) {

    $query = ' INSERT INTO personne ('nom', 'prenom', 'adresseMail', 'numDeTelephone', 'motDePasse') VALUES (:nom, :prenom, :adresseMail, :numDeTelephone, :motDePasse)';
    $donnees = $bdd->prepare($query);
    $donnees->bindParam(":nom", $utilisateur['nom'], PDO::PARAM_STR);
    $donnees->bindParam(":prenom", $utilisateur['prenom'], PDO::PARAM_STR);
    $donnees->bindParam(":adresseMail", $utilisateur['adresseMail']);
    $donnees->bindParam(":numDeTelephone", $utilisateur['numDeTelephone']);
    $donnees->bindParam(":motDePasse", $utilisateur['motDePasse']);
    return $donnees->execute();
}

?>