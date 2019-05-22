<?php

/**
 * Fonctions liées à l'affichage
 */

/**
 * Génère le code HTML d'affichage d'une alerte
 * @param string|null $alerte
 */
function AfficheAlerte(?string $alerte) {
    
    if(!is_null($alerte) && !empty($alerte)) {
        return "<p><strong><i> Alerte : {$alerte}</i></strong></p>";
    }
}
function valeurMode($bdd,$mode){
    $valeurs=[
        "temp" => recupereValeur($bdd,$mode,1),
        "lum" => recupereValeur($bdd,$mode,2),
        "vent" => recupereValeur($bdd,$mode,3),


    ];
    return $valeurs;
}