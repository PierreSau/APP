<?php
/* fonction qui récupère les maisons de idPersonne*/
function recupereradresse(PDO $bdd,$idPersonne){
    return $bdd-> query('SELECT idHabitation,adresse,idUtilisateur FROM habitation WHERE idHabitation IN (SELECT idHabitation FROM relation WHERE idPersonne = '.$idPersonne.')');
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


?>

