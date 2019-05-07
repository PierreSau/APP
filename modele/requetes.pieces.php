
<?php

// fonction qui récupère les capteurs d'une pièce
function recuperercapt(PDO $bdd, $idPiece){
    $reponse=$bdd->query('SELECT * FROM captact INNER JOIN catalogue ON captact.idCatalogue=catalogue.idCatalogue WHERE idPiece='.$idPiece.' ');
    return $reponse->fetchAll();
}

function insertionpiece(PDO $bdd, $nom, $idmaison){
    //on vérifie d'abord que le nom de la pièce n'est pas déjà présent
    $noms=recupererpieces($bdd, $idmaison);
    $doublon=false;
    for($i=0 ; $i<count($noms) ; $i++) {
        if ($nom==$noms[$i]['nom']){
            $doublon=true;
        }
    }
    if ($doublon){
        return false;
    }else {
        $bdd->exec('INSERT INTO `piece` (`idPiece`, `nom`, `idHabitation`) VALUES (NULL, \'' . $nom . '\', \'' . $idmaison . '\')');
        return true;
    }
}

/**Fonction table piece*/

// on récupère les requêtes génériques
include('requetes.generiques.php');


//fonction qui récupère la dernière valeur recue du capteur OU s'il s'agit d'un actionneur de la valeur souhaitée actuelle
//PAS ENCORE FONCTIONNEL!!!!!!!!!
/*
function recuperervalcaptact(PDO $bdd, $NUM, $type, $idcemac){

    if ($type==0){
        return $bdd->query('SELECT VAL FROM tramerecep WHERE ( NUM='.$NUM.' AND idCemac='.$idcemac.' ');
    }
    elseif ($type==1){
        return $bdd->query('SELECT VAL FROM tramerecep WHERE ( NUM='.$NUM.' AND idCemac='.$idcemac.' ');
    }

}
*/