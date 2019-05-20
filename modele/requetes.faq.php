<?php

/**On charge la bdd
 * ATTENTION AU NOM DE LA BDD!!  */
include("modele/connexion.php");

function recupererFAQ()
{
    global $bdd;
    return $bdd->query('SELECT * FROM faq');
}
