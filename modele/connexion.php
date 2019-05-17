<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=bddapp;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
