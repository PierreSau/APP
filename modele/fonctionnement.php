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

function modifieEco($bdd,array $eco,$idmaison){
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$eco['temp'] .'\' WHERE ( nom = \'eco\' and idCatalogue = \'1\' and idHabitation=\''.$idmaison.'\') ');
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$eco['lum'] .'\' WHERE ( nom = \'eco\' and idCatalogue = \'2\' and idHabitation=\''.$idmaison.'\') ');
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$eco['vent'] .'\' WHERE ( nom = \'eco\' and idCatalogue = \'3\' and idHabitation=\''.$idmaison.'\') ');

}
function modifieJour($bdd,array $jour,$idmaison){
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$jour['temp'] .'\' WHERE ( nom = \'jour\' and idCatalogue = \'1\' and idHabitation=\''.$idmaison.'\') ');
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$jour['lum'] .'\' WHERE ( nom = \'jour\' and idCatalogue = \'2\' and idHabitation=\''.$idmaison.'\') ');
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$jour['vent'] .'\' WHERE ( nom = \'jour\' and idCatalogue = \'3\' and idHabitation=\''.$idmaison.'\') ');

}
function modifieNuit($bdd,array $nuit,$idmaison){
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$nuit['temp'] .'\' WHERE ( nom = \'nuit \' and idCatalogue = \'1\' and idHabitation=\''.$idmaison.'\') ');
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$nuit['lum'] .'\' WHERE ( nom = \'nuit\' and idCatalogue = \'2\' and idHabitation=\''.$idmaison.'\') ');
    $bdd->query('UPDATE `fonctionnement` SET `Valeur` = \'' .$nuit['vent'] .'\' WHERE ( nom = \'nuit\' and idCatalogue = \'3\' and idHabitation=\''.$idmaison.'\') ');

}
function recupereValeur($bdd,$type,$idCata,$idmaison){
    $requete= $bdd->query('SELECT Valeur FROM `fonctionnement` WHERE ( nom=\'' .$type .'\' and idCatalogue=\'' .$idCata .'\' and idHabitation=\''.$idmaison.'\') ');
    $retour = $requete-> fetch();
    $requete->closeCursor();
    return $retour['Valeur'];
}