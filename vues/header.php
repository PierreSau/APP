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
    <link rel="stylesheet" href="vues/style.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Ecom</title>
</head>
<header>
    <div  class="logo">
        <a href="index.php"><img src="vues/NomEcoM.png" /></a>
    </div>
    <div align="right">
        <?php
if (isset($_SESSION['adresseMail']))
{
    echo 'Bonjour ' . $_SESSION['adresseMail'];

}?>
        <ul id="menu">

        <li><p><a href="../index.php?cible=maison">Ma Maison</a></p>
            <ul>
                <li><a href="index.php?cible=erreur404">Mes maisons</a></li>
                <li><a href="index.php?cible=capteurs">capteurs</a></li>
                <?php //<li><a href="index.php?cible=consommation">statistiques</a></li>?>
                <li><a href="index.php?cible=utilisateurs&fonction=AccueilPanne">Historique des Pannes</a></li>
                <li><a href="index.php?cible=utilisateurs&fonction=mode">Mode de Fonctionnement</a></li>
            </ul>
        </li>
        <li><p><a href="index.php?cible=erreur404">Magasin</a></p>
            <ul>
                <li><a href="index.php?cible=erreur404">Capteurs</a></li>
                <li><a href="#">Actionneurs</a></li>
            </ul>
        </li>
        <li><p><a href="index.php?cible=utilisateurs&fonction=editionProfil">Mon Compte</a></p>
            <ul>
                <li><a href="index.php?cible=erreur404">Gestion capteurs</a></li>
                <li><a href="index.php?cible=erreur404">Gestion utilisateurs</a></li>
                <li><a href="index.php?cible=utilisateurs&fonction=deconnexion">Deconnexion</a></li>
            </ul>
        </li>
        <li><p><a href="index.php?cible=vcontact">Contactez Nous</a></p>
            <ul>
                <li><a href="index.php?cible=erreur404">Forum</a></li>
            </ul>
        </li>
    </ul>

    </div>
</header>

