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
    <link type="text/css" rel="stylesheet" href="vontact.css" media="all">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Ecom</title>
</head>
<header>
    <div class="logo">
        <a href="index.php"><img src="vues/NomEcoM.png"/></a>
    </div>
    <div align="right">
        <?php
        if (isset($_SESSION['adresseMail'])) {
            echo 'Bonjour ' . $_SESSION['prenom'];
            switch ($_SESSION['niveau']) {
                case 1 :
                    echo ' Vous êtes Utilisateur';
                    break;
                case 2 :
                    echo ' Vous êtes Gestionnaire';
                    break;
                case 3 :
                    echo ' Vous êtes Administrateur';
                    break;
                default:
                    echo 'Cet utilisateurs ne possède pas de rang';
            };
        } ?>
        <ul id="menu">

            <li><p><a href="../index.php?cible=utilisateurs&fonction=maison">Ma Maison</a></p>
                <ul>
                    <li><a href="index.php?cible=capteurs">Capteurs</a></li>
                    <li><a href="index.php?cible=utilisateurs&fonction=stat">Statistiques</a></li>
                    <li><a href="index.php?cible=panne&choix=AccueilPanne">Historique des Pannes</a></li>
                    <li><a href="index.php?cible=utilisateurs&fonction=mode">Mode de Fonctionnement</a></li>
                </ul>
            </li>

            <li><p><a href="index.php?cible=utilisateurs&fonction=editionProfil">Mon Compte</a></p>
                <ul>
                    <?php
                    if (isset($_SESSION['adresseMail'])) {
                        if ($_SESSION['niveau'] == 3) {
                            ?>
                            <li><a href="index.php?cible=catalogue&choix=catalogue">Gestion capteurs</a></li>
                            <li><a href="index.php?cible=utilisateurs&fonction=liste">Gestion utilisateurs</a></li>
                            <?php
                        }
                    }
                    ?>

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

