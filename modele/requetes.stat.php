<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 2019-05-20
 * Time: 10:05
 */

function recupCapteur(PDO $bdd): array
{
    $query = "SELECT * FROM `captact`";;
    //$sth->prepare("SELECT $ FROM table WHERE id = :idUtilisateur")
    $sth = $bdd->prepare($query);
    //$sth->bindValue(":idUtilisateur", $variablePHP)
    $sth->execute();
    $res = $sth->fetchAll();
    return $res;
}


function recupPiece(PDO $bdd, $idUtilisateur): array
{
    $query = "SELECT * FROM `piece` Where ";;
    //$sth->prepare("SELECT $ FROM table WHERE id = :idUtilisateur")
    $sth = $bdd->prepare($query);
    //$sth->bindValue(":idUtilisateur", $variablePHP)
    $sth->execute();
    $res = $sth->fetchAll();
    return $res;
}

function calculConsoPiece(PDO $bdd,$idPiece){

    $sth = $bdd->prepare("SELECT SUM(consommation) FROM `captact`WHERE idPiece = :idPiece");
    $sth->bindValue(":idPiece", $idPiece);
    $sth->execute();
    $res = $sth->fetchAll();
    return $res;
}
