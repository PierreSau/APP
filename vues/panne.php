<?php

?>
<html >
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylepagepanne.css" />

    <title>Déclaration d'une panne</title>
</head>
<body>
<p>
    <h2>
    Pour déclarer votre problème, veuillez sélectionner la caractérique principale de ce problème parmi les solutions proposées ci dessous :
    </h2>
</p>
<P>
<form method="POST" action="controlleurpanne.php">
    <select name="choix" value="choix">
        <option value="pbCemac">Problème de connexion du CeMac</option>
        <option value="pbCapteur">Problème de connexion d'un capteur</option>
        <option value="valAbs">Valeurs absurdes</option>
        <option value="autre">Autre</option>
    </select>
    <input type="submit" value="Valider" />

</form>
</p>
</body>

</html>



