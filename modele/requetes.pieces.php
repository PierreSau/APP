
<?php

// fonction qui récupère les capteurs &actionneurs d'une pièce
function recuperercapt(PDO $bdd, $idPiece,$mode){
    $reponse=$bdd->query('SELECT * FROM captact INNER JOIN catalogue ON captact.idCatalogue=catalogue.idCatalogue WHERE idPiece='.$idPiece.' ');
    $captact=$reponse->fetchAll();
    $maison=$bdd->query('SELECT idHabitation FROM piece WHERE idPiece=\''.$idPiece.'\' ');
    $maison=$maison->fetchAll();
    $idmaison=$maison[0]['idHabitation'];
    for($i=0 ; $i<count($captact) ; $i++) {
        $val=recuperervalcaptact($bdd, $captact[$i]['champNum'],$captact[$i]['champTYP'], $captact[$i]['CaptOuAct'], $captact[$i]['idCemac'],$captact[$i]['idCatalogue'],$mode,$idmaison);
        if (is_bool($val)) {  //il n'y a pas de valeur
            $captact[$i]['valeur'] = '?';
            $captact[$i]['time'] = '?';
        } elseif ($captact[$i]['CaptOuAct']==1){
            $captact[$i]['valeur'] = $val['VAL'];
            $captact[$i]['time'] = $val['TIM'];
        } else {
            $captact[$i]['valeur'] = $val['Valeur'];
            $captact[$i]['time'] =' ';
        }
    }
    return $captact;
}


// fonction qui insère une pièce dans la maison précisée (ne le fait pas si une piece de la maison a deja le meme nom)
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

function recuperervalcaptact(PDO $bdd, $NUM,$TYP, $captouact, $idcemac,$idcatalogue,$mode,$idmaison){
try{
    if ($captouact==1){
        $reponse=$bdd->query('SELECT VAL, TIM FROM tramerecep WHERE ( NUM='.$NUM.' AND idCemac='.$idcemac.' AND TYP='.$TYP.' ) ORDER BY TIM DESC');
        if ($reponse){
            $reponse=$reponse->fetch();
            return $reponse;
        } else{
            return false;
        }
    }
    elseif ($captouact==2){     //ACTIONNEURS FINI
        $reponse=$bdd->query('SELECT Valeur FROM fonctionnement WHERE ( idCatalogue=\''.$idcatalogue.'\' AND nom=\''.$mode.'\' AND idHabitation=\''.$idmaison.'\') ');
        if ($reponse){
            $reponse=$reponse->fetch();
            return $reponse;
        } else{
            return false;
        }
    }
}
catch (Exception $e){
    return'Il y a eu un problème sur la réccupération des données';
}

}

//recuperer capteurs et actionneurs du catalogue
function recuperercapteurs(PDO $bdd){
    try{
    $reponse=$bdd->query('SELECT * FROM catalogue WHERE CaptOuAct=1');
    return $reponse->fetchAll();
    }
    catch (Exception $e){
        return'Il y a eu un problème sur la réccupération de données';
    }
}

function recupereractionneurs(PDO $bdd){
    try{
    $reponse=$bdd->query('SELECT * FROM catalogue WHERE CaptOuAct=2');
    return $reponse->fetchAll();
    }
    catch (Exception $e){
        return'Il y a eu un problème sur la réccupération de données';
    }
}

function recuperernumcemac(PDO $bdd,$idcemac){
    try{
    return ($bdd->query('SELECT numSerie FROM cemac WHERE idCemac='.$idcemac.' '))->fetchAll();
    }
    catch (Exception $e){
        return'Il y a eu un problème sur la réccupération de données';
    }
}

// Permet d'ajouter un capteur/actionneur sans avoir deux fois le même champ num

function ajoutercaptact(PDO $bdd,$idpiece,$idcatalogue,$idcemac,$idmaison){
    try{
    $result= $bdd->query('SELECT `champNum` FROM captact JOIN piece ON captact.idPiece=piece.idPiece WHERE ( idHabitation='.$idmaison.' AND idCatalogue='.$idcatalogue.' )');
    if($result){
        $result=$result->fetchAll();
        for ($i=1;$i<255;$i++){
            $unique=true;
            $hexa=dechex($i);
            for ($j=0;$j<count($result);$j++){              //on regarde tous les mêmes capteurs de la maison
                if ($hexa==$result[$j]['champNum']){        //si 1 est égal au chiffre hexa, il faut passer au chiffre hexa suivant
                    $unique=false;                          //sinon, unique reste true et le champ NUM n'est pas encore utilisé
                    break;
                }
            }
            if($unique){
                $champnum=$hexa;
                break;
            }
        }
    } else {      //cas où il n'y a pas de capteurs de même type dans la maison : on donne le champ num='1'
        $champnum='1';
        $unique=true;
    }
    if ($unique){
        $bdd->exec('INSERT INTO `captact` (`idCaptAct`, `etat`, `champNum`, `idPiece`, `idCemac`, `idCatalogue`,`consommation`) VALUES (NULL,1,\'' . $champnum . '\', \'' . $idpiece . '\',\'' . $idcemac . '\',\'' . $idcatalogue . '\',0)');
        return 'ajout réussi';
    } else{
        return'Il y a trop de capteurs de même type dans la maison';
    }
    }
    catch (Exception $e){
        return'Il y a eu un problème dans l\'ajout du capteur';
    }

}


//Permet de savoir si des capteurs sont déjà présents dans la maison. si ce 'est pas le cas, le cemac n'est toujours pas informé!
function nbcaptact(PDO $bdd, $idmaison){
    try{
    $result= $bdd->query('SELECT COUNT(`idCaptAct`) FROM captact JOIN piece ON captact.idPiece=piece.idPiece WHERE idHabitation='.$idmaison.' ');
    $result=$result->fetch();
    return($result[0]);
    }
    catch (Exception $e){
        return'Il y a eu un problème dans la réccupération des données';
    }
}


//permet d'ajouter le cemac et on récupère l'id!
function ajoutercemac(PDO $bdd, $numcemac,$idpiece,$idcatalogue){
    try{
    $bdd -> exec('INSERT INTO `cemac`(`idCemac`, `numSerie`) VALUES (NULL,\''.$numcemac.'\')');
    $bdd->exec('INSERT INTO `captact` (`idCaptAct`, `etat`, `champNum`, `idPiece`, `idCemac`, `idCatalogue`,`consommation`) VALUES (NULL,1,1, \'' . $idpiece . '\',LAST_INSERT_ID(),\'' . $idcatalogue . '\',0)');
    return 'Ajout du composant réussi';
    }
    catch (Exception $e){
        return'Il y a eu un problème dans l\'ajout du capteur';
    }
}

function supprimerpiece(PDO $bdd,$idpiece){
    $bdd ->exec('DELETE FROM `piece` WHERE `piece`.`idPiece` =\''.$idpiece.'\' ');
    return 'Pièce supprimée';
}

function supprimercaptact(PDO $bdd,$type,$num,$idmaison){
    $result=$bdd->query('SELECT idCaptAct FROM captact JOIN catalogue ON captact.idCatalogue=catalogue.idCatalogue WHERE (catalogue.type=\''.$type.'\' AND champNum=\''.$num.'\' AND idPiece IN(SELECT idPiece FROM piece WHERE idHabitation=\''.$idmaison.'\')) ');
    $result=$result->fetchall();
    $bdd->exec('DELETE FROM captact WHERE idCaptAct=\''.$result[0]['idCaptAct'].'\' ');
    return 'composant supprimé';
}

function recuperermode(PDO $bdd,$idpiece){
    $result=$bdd->query('SELECT nom, dateDebut, DATE_FORMAT(dateDebut, "%H:%i:%s") AS heureDebut, dateFin , DATE_FORMAT(dateFin, "%H:%i:%s") AS heureFin FROM modification INNER JOIN fonctionnement ON modification.idFonctionnement=fonctionnement.idFonctionnement WHERE idPiece='.$idpiece.' ORDER BY dateDeModification DESC');
    $result=$result->fetchAll();
    $date=date("Y-m-d H:i:s");
    $heure=date("H:i:s");
    for ($i=0;$i<count($result);$i++){
        if ($date>=$result[$i]['dateDebut'] and $date<=$result[$i]['dateFin'] and $heure>=$result[$i]['heureDebut'] and $heure<=$result[$i]['heureFin']){
                return $result[$i]['nom'];
        }
    }
    return 'eco';
}


function ajoutermodif(PDO $bdd,$piece,$idmaison,$debut,$fin,$mode){
    $date=date("Y-m-d H:i:s");
    $result=$bdd->query('SELECT idFonctionnement FROM fonctionnement WHERE (nom=\''.$mode.'\' AND idHabitation=\''.$idmaison.'\') ');
    if($result) {
        $result = $result->fetchAll();
        for ($i = 0; $i < count($result); $i++) {
            $idfonctionnement = $result[$i]['idFonctionnement'];
            $bdd->exec('INSERT INTO `modification`(`idModification`, `dateDeModification`, `dateDebut`, `dateFin`, `idPiece`, `idFonctionnement`) VALUES (NULL,\'' . $date . '\',\'' . $debut . '\',\'' . $fin . '\',\'' . $piece . '\',\'' . $idfonctionnement . '\') ');
        }
        return "l'heure a été enregistré";
    } else{
        return "l'ajout a échoué";
    }
}


