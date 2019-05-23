<?php

$table = "users";
function recupereTousCapteur(PDO $bdd): array
{
    $query = 'SELECT * FROM catalogue WHERE CaptOuAct = 1';
    return $bdd->query($query)->fetchAll();
}

function recupereTousActionneur(PDO $bdd): array
{
    $query = 'SELECT * FROM catalogue WHERE CaptOuAct = 2';
    return $bdd->query($query)->fetchAll();
}

function ajouteCatalogue(PDO $bdd, array $catalogue)
{
    $bdd->exec('INSERT INTO catalogue ( `type`, unite, champTYP,CaptOuAct) VALUES ( \'' . $catalogue['type'] . '\', \'' . $catalogue['unite'] . '\', \'' . $catalogue['champTYP'] . '\', \'' . $catalogue['CaptOuAct'] . '\')');
    return true;
}