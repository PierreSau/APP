<?php
/* fonction qui récupère les maisons de idPersonne*/
function recupereradresse(PDO $bdd,$idPersonne){
    return $bdd-> query('SELECT idHabitation,adresse FROM habitation WHERE idHabitation IN (SELECT idHabitation FROM relation WHERE idPersonne = '.$idPersonne.')');
}

/* fonction qui récupère les pièces de la maison idMaison*/
function recupererpieces(PDO $bdd, $idMaison){
    $reponse=$bdd->query('SELECT idPiece, nom FROM piece WHERE idHabitation='.$idMaison.' ');
    return $reponse->fetchAll();

}

/* fonction qui récupère l'id de la maison ;;; retourne 0 si il y a une erreur*/
function idmaison(PDO $bdd, $idPersonne, $maison){
    $idmaison=recupereradresse($bdd,$idPersonne);
    $idmaison= $idmaison->fetchAll();
    if ($maison>0 and $maison<count($idmaison)+1){
        return $idmaison[$maison-1];
    }else{
        return 0;
    }

}

function ajoutermaison(PDO $bdd, $idPersonne,$adresse,$relation){
    $bdd->exec('INSERT INTO `habitation` (`idHabitation`, `adresse`) VALUES (NULL,\'' . $adresse . '\')');
    $bdd->exec('INSERT INTO `relation`(`idRelation`, `typeUtilisateur`, `idHabitation`, `idPersonne`) VALUES (NULL,\'' . $relation . '\',LAST_INSERT_ID(),\'' . $idPersonne . '\')');
    return;
}

function supprimermaison(PDO $bdd,$maison,$idPersonne){
    $result=$bdd->query('SELECT idHabitation FROM habitation WHERE idHabitation IN (SELECT idHabitation FROM relation WHERE idPersonne = '.$idPersonne.')');
    $result=$result->fetchAll();
    $idmaison=$result[$maison-1]['idHabitation'];
    $bdd->exec('DELETE FROM `habitation` WHERE `habitation`.`idhabitattion` =\''.$idmaison.'\' ');
    $bdd->exec('DELETE FROM `relation` WHERE `relation`.`idHabitation` =\''.$idmaison.'\' ');
    return 'Maison supprimée';
}

?>

