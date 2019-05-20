<?php

/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 2019-05-05
 * Time: 17:25
 */

include ("modele/requetes.stat.php");
$ArrayPiece = recupPiece($bdd);
$ArrayConso = array();

foreach ($ArrayPiece as $piece ){
    $ArrayConso[]=calculConsoPiece($bdd, $piece[0]);
}

?>


