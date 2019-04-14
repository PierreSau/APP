<?php

/**On charge la bdd
 * ATTENTION AU NOM DE LA BDD!!  */
try {

    $bdd = new PDO('mysql:host=localhost;dbname=app;charset=utf8', 'root', '');
} catch (Exception $e) {
    die($e->getMessage());
}


function recupererFAQ()
{
    global $bdd;
    return $bdd->query('SELECT * FROM faq');
}
