<?php
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
function recupPiece(PDO $bdd): array
{
    $query = "SELECT * FROM `piece`";;
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