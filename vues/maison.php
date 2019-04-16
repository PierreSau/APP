<html>

<body>

<?php

while ($donnees = $maisons->fetch())
{

    print($donnees['adresse']);

}

$maisons->closeCursor();