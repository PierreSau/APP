<?php
include ('modele/requetes.generiques.php');

function ajoutePanne($bdd,$typePanne,$idcapt)
{

    $bdd->query('INSERT INTO'.' `panne` (`idPanne`, `date`, `type`, `idCemac`) VALUES (NULL, \''.date('Y-m-d H:i:s').'\', \''. $typePanne. '\', NULL);');
    //gérer le cas où la première requete ne foncitonne pas
    $bdd->query('INSERT INTO `pannecaptact` (`idPanneCaptAct`, `idCaptAct`, `idPanne`) VALUES (NULL, \''.$idcapt.'\', LAST_INSERT_ID());');


}

function recupererEmail($bdd)
{
    $requete1= $bdd->query('SELECT MAX(idPanne) FROM panne');
    $retour1 = $requete1-> fetch();
    $requete1->closeCursor();


    $requete2= $bdd->query('SELECT adresseMail FROM personne
INNER JOIN relation ON relation.idPersonne = personne.idPersonne
INNER JOIN habitation ON habitation.idHabitation=relation.idHabitation
INNER JOIN piece ON piece.idHabitation=habitation.idHabitation
INNER JOIN captact ON captact.idPiece=piece.idPiece
INNER JOIN pannecaptact ON pannecaptact.idCaptAct=captact.idCaptAct
INNER JOIN panne ON panne.idPanne= pannecaptact.idPanne
WHERE panne.idPanne = \''.$retour1['MAX(idPanne)'].'\'

');
    $retour2 = $requete2-> fetch();
    $requete2->closeCursor();

    return $retour2['adresseMail'];
}
