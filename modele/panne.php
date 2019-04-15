<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bddapp;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

function ajoutePanne($bdd,$typePanne)
{
    $bdd->query('INSERT INTO'.' `panne` (`idPanne`, `date`, `type`, `idCemac`) VALUES (NULL, \''.date('Y-m-d').'\', \''. $typePanne. '\', NULL);');
    $bdd->query('INSERT INTO `pannecaptact` (`idPanneCaptAct`, `idCaptAct`, `idPanne`) VALUES (NULL, \'1\', LAST_INSERT_ID());');
}

function recupererEmail($bdd)
{
    $requete1= $bdd->query('SELECT MAX(idPanne) FROM panne');
    $retour1 = $requete1-> fetch();
    $requete1->closeCursor();


    $requete2= $bdd->query('SELECT adresseMail FROM personne
INNER JOIN habitation ON habitation.idUtilisateur=personne.idPersonne
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
