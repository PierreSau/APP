<?php
/**
* Vue : entête HTML
 *
 *
 *
 * changer pour en faire un vrai header php la c'est nul
 *
*/



?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="header.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<header>
    <div  class="logo">
    <img src="ecom.jpg" />
    </div>
    <div align="right">
    <ul id="menu">

        <li><p><a href="../index.php?cible=maison">Ma Maison</a></p>
            <ul>
                <li><a href="../index.php?cible=capteurs">Mes maisons</a></li>
                <li><a href="../index.php?cible=capteurs">capteurs</a></li>
                <li><a href="../index.php?cible=consommation">statistiques</a></li>
            </ul>
        </li>
        <li><p><a href="../index.php?cible=erreur404">Magasin</a></p>
            <ul>
                <li><a href="../index.php?cible=erreur404">Capteurs</a></li>
                <li><a href="#">Actionneurs</a></li>
            </ul>
        </li>
        <li><p><a href="../index.php?cible=utlisateur">Mon Compte</a></p>
            <ul>
                <li><a href="../index.php?cible=erreur404">profil</a></li>
                <li><a href="../index.php?cible=erreur404">Gestion capteurs</a></li>
                <li><a href="../index.php?cible=erreur404">Gestion utilisateurs</a></li>
                <li><a href="#">Deconnexion</a></li>
            </ul>
        </li>
        <li><p><a href="../index.php?cible=vontact">Contactez Nous</a></p>
            <ul>
                <li><a href="../index.php?cible=erreur404">Forum</a></li>
                <li><a href="../index.php?cible=erreur404">FAQ</a></li>
            </ul>
        </li>
    </ul>
    </div>
</header>

