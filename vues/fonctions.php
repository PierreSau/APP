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
        return "<p><strong><i>{$alerte}</i></strong></p>";
    }
}
function valeurMode($bdd,$mode,$idmaison){
    $valeurs=[
        "temp" => recupereValeur($bdd,$mode,1,$idmaison),
        "lum" => recupereValeur($bdd,$mode,2,$idmaison),
        "vent" => recupereValeur($bdd,$mode,3,$idmaison),


    ];
    return $valeurs;
}