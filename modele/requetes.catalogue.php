<?php
include('requetes.generiques.php');
$table = "users";
function recupereTousCapteur(PDO $bdd): array
{
    $query = 'SELECT * FROM catalogue WHERE CaptOuAct = 1';
    return $bdd->query($query)->fetchAll();
}

function recupereTousActionneur(PDO $bdd): array
{
    $query = 'SELECT * FROM catalogue WHERE CaptOuAct = 2';
    return $bdd->query($query)->fetchAll();
}

function ajouteUtilisateur(PDO $bdd, array $utilisateur)
{
    $bdd->exec('INSERT INTO catalogue (nom, prenom, adresseMail, numDeTelephone, motDePasse, niveau, langue) VALUES ( \'' . $utilisateur['nom'] . '\', \'' . $utilisateur['prenom'] . '\', \'' . $utilisateur['adresseMail'] . '\', \'' . $utilisateur['numDeTelephone'] . '\',\'' . $utilisateur['motDePasse'] . '\',1,1)');
    return true;
}