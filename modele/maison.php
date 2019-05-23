<?php
/* fonction qui récupère les maisons de idPersonne*/
function recupereradresse(PDO $bdd,$idPersonne){
    return $bdd-> query('SELECT habitation.idHabitation,adresse, typeUtilisateur FROM habitation INNER JOIN relation ON habitation.idHabitation=relation.idHabitation WHERE relation.idPersonne =\''.$idPersonne.'\' ');
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
    $id=$bdd->query('SELECT LAST_INSERT_ID()');
    $id=$id->fetchall();
    $id=$id[0][0];
    print($id);
    $bdd->exec('INSERT INTO `relation`(`idRelation`, `typeUtilisateur`, `idHabitation`, `idPersonne`) VALUES (NULL,\'' . $relation . '\',\'' . $id . '\',\'' . $idPersonne . '\')');

    $bdd->exec('INSERT INTO `fonctionnement`(`idFonctionnement`, `nom`, `Valeur`, `idHabitation`, `idCatalogue`) VALUES (NULL,"eco","17",\'' . $id . '\',"1")');
    $bdd->exec('INSERT INTO `fonctionnement`(`idFonctionnement`, `nom`, `Valeur`, `idHabitation`, `idCatalogue`) VALUES (NULL,"eco","3",\'' . $id . '\',"2")');
    $bdd->exec('INSERT INTO `fonctionnement`(`idFonctionnement`, `nom`, `Valeur`, `idHabitation`, `idCatalogue`) VALUES (NULL,"eco","0",\'' . $id . '\',"3")');

    $bdd->exec('INSERT INTO `fonctionnement`(`idFonctionnement`, `nom`, `Valeur`, `idHabitation`, `idCatalogue`) VALUES (NULL,"jour","20",\'' . $id . '\',"1")');
    $bdd->exec('INSERT INTO `fonctionnement`(`idFonctionnement`, `nom`, `Valeur`, `idHabitation`, `idCatalogue`) VALUES (NULL,"jour","0",\'' . $id . '\',"2")');
    $bdd->exec('INSERT INTO `fonctionnement`(`idFonctionnement`, `nom`, `Valeur`, `idHabitation`, `idCatalogue`) VALUES (NULL,"jour","0",\'' . $id . '\',"3")');

    $bdd->exec('INSERT INTO `fonctionnement`(`idFonctionnement`, `nom`, `Valeur`, `idHabitation`, `idCatalogue`) VALUES (NULL,"nuit","15",\'' . $id . '\',"1")');
    $bdd->exec('INSERT INTO `fonctionnement`(`idFonctionnement`, `nom`, `Valeur`, `idHabitation`, `idCatalogue`) VALUES (NULL,"nuit","0",\'' . $id . '\',"2")');
    $bdd->exec('INSERT INTO `fonctionnement`(`idFonctionnement`, `nom`, `Valeur`, `idHabitation`, `idCatalogue`) VALUES (NULL,"nuit","0",\'' . $id . '\',"3")');

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

