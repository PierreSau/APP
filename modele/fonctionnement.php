<?php
/**
 * Created by PhpStorm.
 * User: vince
 * Date: 21/05/2019
 * Time: 14:28
 */

/**
 * Created by PhpStorm.
 * User: vince
 * Date: 15/05/2019
 * Time: 11:26
 */

//INSERT INTO `catalogue` (`idCatalogue`, `type`, `unite`, `champTYP`, `CaptOuAct`) VALUES (NULL, 'temp', '°C', 'TMP', '1');

function modifieEco($bdd,array $eco){
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$eco['temp'] .'\' WHERE nom = \'eco\' and idCatalogue = \'1\';');
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$eco['lum'] .'\' WHERE nom = \'eco\' and idCatalogue = \'2\';');
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$eco['vent'] .'\' WHERE nom = \'eco\' and idCatalogue = \'3\';');

}
function modifieJour($bdd,array $jour){
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$jour['temp'] .'\' WHERE nom = \'jour\' and idCatalogue = \'1\';');
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$jour['lum'] .'\' WHERE nom = \'jour\' and idCatalogue = \'2\';');
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$jour['vent'] .'\' WHERE nom = \'jour\' and idCatalogue = \'3\';');

}
function modifieNuit($bdd,array $nuit){
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$nuit['temp'] .'\' WHERE nom = \'nuit \' and idCatalogue = \'1\';');
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$nuit['lum'] .'\' WHERE nom = \'nuit\' and idCatalogue = \'2\';');
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$nuit['vent'] .'\' WHERE nom = \'nuit\' and idCatalogue = \'3\';');

}
function recupereValeur($bdd,$type,$idCata){
    $requete= $bdd->query('SELECT Valeur FROM `fonctionnement` WHERE nom=\'' .$type .'\' and idCatalogue=\'' .$idCata .'\';');
    $retour = $requete-> fetch();
    $requete->closeCursor();
    return $retour['Valeur'];
}