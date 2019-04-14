<?php

/**On charge la bdd
 * ATTENTION AU NOM DE LA BDD!!  */
try {

    $bdd = new PDO('mysql:host=localhost;dbname=bdd ecom;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die("La base de données n'a pas pu se charger");
}


function recupererFAQ(){
    global $bdd;
    return $bdd-> query('SELECT * FROM faq');
}
